//Inc_IntermediaryClass.php
<?php

// Created by Kondabolu

// Intermediary class
class BusinessTierClass {
    public $error;

    public function __construct() {
        include("inc_databaseClass.php");
    }

    // Method to get data
    function getData($stuID) {
        $result = NULL; // to store data

        $selectQuery = "SELECT n.stuID, CONCAT(n.stuFirstName, ' ', n.stuLastName) as stuName, j.subjectCode, j.subjectName, s.semester, s.gradeDescription, s.letterGrade FROM students n JOIN student_subject s ON (n.stuID = s.studentID) JOIN subjects j ON (j.subjectCode = s.subjectCode) where studentId = ?";
        $type="i";
        $connectClass = new DataConnectClass();
        $result = $connectClass->ParamSelectQuery($selectQuery, $type, $stuID);

        if ($result) {
            return $result;
        } else {
            return FALSE; // data did not fetch.
        }
    }

    // Method to fill options
    public function filloptions() {
        $result = NULL; // to store data

        $selectQuery = "SELECT stuID, CONCAT(stuFirstName, ' ', stuLastName) AS studentName FROM students";
        $connectClass = new DataConnectClass();
        $result = $connectClass->SimpleSelectQuery($selectQuery);

        if ($result) {
            return $result;
        } else {
            $this->error = $connectClass->error();
            return FALSE; // data did not fetch.
        }
    }
}
?>
