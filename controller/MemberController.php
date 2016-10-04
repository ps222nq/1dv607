<?php

require_once("../model/Member.php");

class MemberController {

    public function addMember($formData) {
        $message = "";
        try {
            $name = $formData["name"];
            $personalNumber = $formData["pnr"];
            $id = 1; //TODO: create connection that reads length of JSON obj to determine ID instead

            $newMember  = new \model\Member($name, $personalNumber, $id);

            $message .= "Created new Member " . $newMember.memberString();

        }
        catch (Exception $e) {
            $message .= "Something went wrong, error message is: " . $e.message;
        }

        return $message;
    }

}