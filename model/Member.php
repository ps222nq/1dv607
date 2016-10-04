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
            return "Name must be a string between 0 and 50 characters";
        }
    }

    public function getPersonalNumber() {
        return $personalNumber;
    }

    public function setPersonalNumber($argPnr) {
    //TODO: validation of PNR
    }

    public function getId() {
        return  $id;
    }

    public function setId($argId) {
        //TODO: more extensive validation
        if(is_numeric($argId)){
            $id = $argId;
        }
    }
}
?>