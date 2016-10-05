<?php
namespace model;

class Member {

    private $name;
    private $personalNumber;
    private $id;
    private $assets = array();

    public function __construct($cName, $cPersonalNumber, $cId)
    {
        $this->setName($cName);
        $this->setPersonalNumber($cPersonalNumber);
        $this->setId($cId);
    }

    public function toString(){

        return "Name: " . $this->name . ", Personal Number: " . $this->personalNumber . ", ID: " . $this->id;
    }

    public function getName() {
        return  $this->name;
    }

    public function setName($argName) {
        if(is_string($argName) && strlen($argName) > 0 && strlen($argName) < 50){
            $this->name = $argName;
            return "Name set to " . $argName;
        } else {
            throw new \Exception("Name must be a string between 0 and 50 characters");
        }
    }

    public function getPersonalNumber() {
        return $this->personalNumber;
    }

    function isValidPNR($pnr) {
        $yearOfBirth = 0;
        if(strlen($pnr) !== 13) {
            throw new \Exception("Please enter personal number in format YYYYMMDD-XXXX");
        } else {
            return TRUE;
        }
    }

    public function setPersonalNumber($argPnr) {
        if($this->isValidPNR($argPnr) === TRUE){
            $this->personalNumber = $argPnr;
        } else {
            throw new \Exception("Personal number not valid, please try again.");
        }
    }


    public function getId() {
        return  $this->id;
    }

    public function setId($argId) {
        //TODO: more extensive validation
        if(is_numeric($argId) && $argId > 0){
            $this->id = $argId;
            return "User ID set to " . $argId;
        } else {
            throw new \Exception("User ID not set, please try again");
        }
    }
}
?>