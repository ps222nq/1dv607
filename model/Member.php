<?php
class Member {

    private $name;
    private $personalNumber;
    private $id;

    public function getName() {
        return  $name;
    }

    public function setName($argName) {
        if(is_string($argName) && strlen($argName) > 0 && strlen($argName) < 50){
            $name = $argName;
            return "Name set to " . $argName;
        } else {
            throw new \Exception("Name must be a string between 0 and 50 characters");
        }
    }

    public function getPersonalNumber() {
        return $personalNumber;
    }

    public function setPersonalNumber($argPnr) {
        if(isValidPNR($argPnr) === TRUE){
            $personalNumber = $argPnr;
        } else {
            throw new \Exception("Personal number not valid, please try again.");
        }
    }

    private function isValidPNR($pnr) {
        if(
        //TODO: validation code here
        ){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getId() {
        return  $id;
    }

    public function setId($argId) {
        //TODO: more extensive validation
        if(is_numeric($argId) && argId > 0){
            $id = $argId;
            return "User ID set to " . $argId;
        } else {
            throw new \Exception("User ID not set, please try again");
        }


    }
}
?>