<!--inc_QueryResults.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Parametrised Queries</title>
    <!-- created by Kondabolu -->
    <style type="text/css">
        table, th, td {
            border: 1px solid black; border-collapse: collapse;
        }
        td { padding: 5px; }
        body {
            margin-left: 20px;
            margin-right: 20px;
        }
        select {
            padding: 3px;
        }
    </style>
</head>
<body>
    <h1>Database Connectivity Parametrized Queries</h1>
    <form action="" method="POST">
        <span>
            <label>Select Student Name: </label>
            <select id="studentselect" name="studentselect">
                <?php
                include("Inc_IntermediaryClass.php");
                $intClass = new BusinessTierClass();
                $result = $intClass->filloptions();

                while ($row = $result->fetch_assoc()) {
                    $selected = NULL;
                    if (isset($_POST['submit'])) {
                        if ($_POST['studentselect'] == $row['stuID']) {
                            $selected = "selected";
                        }
                    }
                    echo "<option value=".$row['stuID']." ".$selected.">".$row['studentName']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="submit" name="submit"/>
        </span>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $stuID = $_POST['studentselect']; // Corrected variable name
        $result = $intClass->getData($stuID); // Corrected variable name

        if ($result) {
            echo "<h4>Grade Details</h4>";
            echo "<table><tr><td>Student ID</td><td>Student Full Name</td><td>Subject Code</td><td>Subject Name</td><td>Semester</td><td>Grade Description</td><td>Letter Grade</td></tr>";

            while ($row = $result->fetch_assoc()) { // Corrected method name
                echo "<tr>";
                echo "<td>".$row['stuID']."</td>";
                echo "<td>".$row['stuName']."</td>";
                echo "<td>".$row['subjectCode']."</td>";
                echo "<td>".$row['subjectName']."</td>";
                echo "<td>".$row['semester']."</td>";
                echo "<td>".$row['gradeDescription']."</td>";
                echo "<td>".$row['letterGrade']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo $intClass->error; // Added missing arrow (->) operator
        }
    }
    ?>
</body>
</html>
