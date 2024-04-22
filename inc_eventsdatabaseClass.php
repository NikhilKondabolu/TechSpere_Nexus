<?php
// Created By Valusa
// Include credentials file.
class DataConnectClass {
    private static $connection;
    private $error;

    private function Connect() {
        include "inc_eventsdbConfig.php";
        self::$connection = new mysqli($host, $username, $password, $database);
        if (self::$connection === FALSE) {
            return FALSE;
        }
        return self::$connection;
    }

    public function ParamSelectQuery($sqlQuery, $datatypes = NULL, ...$params) {
        $connection = $this->Connect();
        $result = NULL;
        if ($connection) {
            $sqlStatement = $connection->prepare($sqlQuery);
            if ($sqlStatement) {
                if (!empty($params)) {
                    $sqlStatement->bind_param($datatypes, ...$params);
                }
                $sqlStatement->execute();
                $result = $sqlStatement->get_result();
                $sqlStatement->close();
            } else {
                $this->error = $connection->error;
            }
            $connection->close();
        }
        return $result;
    }

    public function SimpleSelectQuery($sqlStatement) {
        $connection = $this->Connect();
        if ($connection) {
            $result = $connection->query($sqlStatement);
            $connection->close();
            if (!$result) {
                $this->error = $connection->error;
            }
            return $result;
        }
        return FALSE;
    }

    public function error() {
        return $this->error;
    }
}
?>
