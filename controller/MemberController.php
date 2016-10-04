<?php

namespace controller;

require_once("../model/Member.php");
require_once ("RegistryController.php");

class MemberController {

    public function addMember($formData) {
        $message = "";
        try {
            $name = $formData["name"];
            $personalNumber = $formData["pnr"];
            $id = 1; //TODO: create connection that reads length of JSON obj to determine ID instead

            $newMember  = new \model\Member($name, $personalNumber, $id);

            $message .= "Created new Member: " . $newMember->toString();

        }
        catch (\Exception $e) {
            $message .= "Something went wrong, error message is: " . $e->getMessage();
        }

        return $message;
    }

    public function updateMember($formData) {
        //TODO: implement
    }

    public function deleteMember($formData) {
        //TODO: implement
    }

    public function getMemberInfo($formData) {
        //TODO: implement
    }

}