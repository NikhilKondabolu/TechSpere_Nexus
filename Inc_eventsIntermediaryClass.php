<?php
//Created By Valusa
class BusinessTierClass {
    public $error;

    public function __construct() {
        include("inc_eventsdatabaseClass.php");
    }

    function getEventData($eventName) {
        $result = NULL;
        $selectQuery = "SELECT eventName, eventDate, eventTime, eventLocation, eventDescription FROM events WHERE eventName = ?";
        $type = "s";
        $connectClass = new DataConnectClass();
        $result = $connectClass->ParamSelectQuery($selectQuery, $type, $eventName);

        if ($result) {
            return $result;
        } else {
            return FALSE; // data did not fetch.
        }
    }

    public function fillEventOptions() {
        $result = NULL;
        $selectQuery = "SELECT eventName FROM events";
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