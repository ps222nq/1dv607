<?php
<<<<<<< HEAD
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 09:56
 */

namespace model;


class Member
{

}
=======
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
        if(isValidPNR($argPnr) === TRUE){
            $personalNumber = $argPnr;
        } else {
            return "Personal number not valid, please try again."
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
            return "Could not set user ID. Please try again";
        }


    }
}
?>
>>>>>>> 5ce530760bad05bb226f082626ebd936a144f611
