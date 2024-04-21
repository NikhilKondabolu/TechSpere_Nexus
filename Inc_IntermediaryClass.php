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
    function getData($ids) {
        $result = NULL; // to store data
         // Construct the WHERE clause dynamically for multiple selections
         $placeholders = implode(', ', array_fill(0, count($ids), '?'));
        $selectQuery = "SELECT  topic, post_title, post_content, pro_tip, trick FROM tech_topics where topic IN ($placeholders)";
        $type = str_repeat('s', count($ids));
        $connectClass = new DataConnectClass();
        $result = $connectClass->ParamSelectQuery($selectQuery, $type, ...$ids);

        if ($result) {
            return $result;
        } else {
            return FALSE; // data did not fetch.
        }
    }

    // Method to fill options
    public function filloptions() {
        $result = NULL; // to store data

        $selectQuery = "SELECT topic, post_content FROM tech_topics";
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
