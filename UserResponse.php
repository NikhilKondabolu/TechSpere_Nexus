<?php
// Created by Valusa
class HelloWorldClass {
    // Properties declaration
    public $Name;
    public $Phone;
    
    // Constructor method
    public function __construct($name, $phone) {
        // Set the name and phone properties with the values of the incoming parameters
        $this->Name = $name;
        $this->Phone = $phone;
    }
    
    // Public method to say hello
    public function Welcome() {
        // Using the value in the name property, return a hello message
        return "Hello $this->Name! Thanks for your feedback! We will contact you on this phone number $this->Phone.";
    }
}
?>