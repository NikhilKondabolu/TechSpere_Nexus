//inc_databaseClass.php
<?php
// Include credentials file.
class DataConnectClass {
    // Declaring connection as a property.
    // Access modifier is static because the value needs to be available even after the connect() function execution is done.
    // The connection needs to be alive for the query functions.
    private static $connection;
    private $error;

    private function Connect() {
        // This method is accessible only within the class hence 'private'.
        // Instantiates mysqli() connection and returns it.
        // You use self for static members.
        // Include the config file: 
        include "inc_dbConfig.php";

        // Instantiate mysqli object and supply config arguments.
        // Instantiating the connection and return the connection.
        // Connection is open when mysqli() is successfully instantiated.
        self::$connection = new mysqli($host, $username, $password, $database);

        if (self::$connection === FALSE) {
            // Connection not open yet.
            // Return false to the calling function signifying that the connection failed.
            return FALSE;
        }
        // If connection succeeds, return the connection object.
        return self::$connection;
    }

    // Connect() method.

    public function ParamSelectQuery($sqlQuery, $datatypes = NULL, $param1 = NULL, $param2 = NULL, $param3 = NULL, $param4 = NULL, $param5 = NULL, $param6 = NULL) {
        // This method received a SQL query in a format ready to be prepared, i.e., with '?' and supply the parameters for it exactly in the right order. 
        // The $datatypes param contains the data types supplied for each parameter, in the correct order.
        
        // Get the connection by calling Connect() method.
        $connection = $this->Connect();

        // To hold the data.
        $result = NULL;

        // Parametrize the query: prepare SQL statement using the $connection object.
        $sqlStatement = $connection->stmt_init();
        $sqlStatement= $connection->prepare($sqlQuery);

        // Create an array of parameters which are not null.
        $paramArray = array();

        if (!is_null($param1)) array_push($paramArray, $param1);
        if (!is_null($param2)) array_push($paramArray, $param2);
        if (!is_null($param3)) array_push($paramArray, $param3);
        if (!is_null($param4)) array_push($paramArray, $param4);
        if (!is_null($param5)) array_push($paramArray, $param5);
        if (!is_null($param6)) array_push($paramArray, $param6);

        // Bind the statement with parameters.
        $bindResult = $sqlStatement->bind_param($datatypes, ...$paramArray);

        if ($bindResult) {
            $sqlStatement->execute();
            $result = $sqlStatement->get_result();
        } else {
            $this->error = "Statement Binding Failed: " . $sqlStatement->error;
        }

        // Close the statement.
        $sqlStatement->close();

        // Close the connection.
        $connection->close();

        return $result;
    }

    // Method ParamsSelectQuery()

    public function SimpleSelectQuery($sqlStatement) {
        // Connect to the database
        $connection = $this->Connect();

        // Query the database
        $result = $connection->query($sqlStatement);

        // Close the connection
        $this->CloseConnection();

        if (!$result) {
            $this->error = $connection->error;
        }

        return $result; // Returns the result.
    }

    // End simpleSelectQuery()

    public function error() {
        // Returns the db error stored as property.
        return $this->error;
    }

    // End function error

    public function CloseConnection() {
        self::$connection->close();
    }
}

// End class.
?>
