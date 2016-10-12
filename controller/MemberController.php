<?php

namespace controller;

require_once("././model/Member.php");
require_once ("RegistryController.php");

class MemberController {

    private $membersList;
    private $register;

        public function __construct(){
        $this->register = new \controller\RegistryController();
        $this->membersList = $this->register->getData();
    }


    private function getUniqueID(){
        $maxID = 0;
        $memberID = 0;

        foreach ($this->membersList as $member) {
            $memberID = $member->getId();
            if($memberID > $maxID){
                $maxID = $memberID;
            };
        }

        //add 1 to the current maximum id to get a unique higher id.
        return $maxID + 1;
    }



    public function getMembersList(){
        return $this->membersList;
    }


    public function getMemberObjecy($id) {
        foreach ($this->membersList as $member) {
            if($member->getId() == $id){
                return $member;
            }
        }
    }


    public function addMember($formData) {
        $message = "";
        try {
            $name = $formData["name"];
            $personalNumber = $formData["personalnumber"];
            $id = $this->getUniqueID();

            $newMember  = new \model\Member($name, $personalNumber, $id);

            if($this->isDuplicate($newMember)){
                $message .= "Member already exists: " . $newMember->toString();
            } else {
                array_push($this->membersList, $newMember);
                $this->register->writeData($this->membersList);
                $message .= "Created new Member: " . $newMember->toString();
            }

        }
        catch (\Exception $e) {
           echo $message .= "Something went wrong, error message is: " . $e->getMessage();
        }

        return $message;

    }


    public function isDuplicate($member){
        foreach($this->membersList as $memberFromList){
            if($member->getPersonalNumber() === $memberFromList->getPersonalNumber()){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function updateMemberNameAndPersonalNumber($formData) {
        try{
            $id = $formData['id'];
            $personalNumber = $formData['personalNumber'];
            $name = $formData['name'];
            $memberToUpdate = $this->getMemberObjecy($id);

            $memberToUpdate->setName($name);
            $memberToUpdate->setPersonalNumber($personalNumber);

            $this->register->writeData($this->membersList);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function deleteMember($id) {
        $member = $this->getMemberObjecy($id);
        $index = $this->getListIndexForMember($member);
        unset($this->membersList[$index]);
        $this->register->writeData($this->membersList);
    }


    public function getListIndexForMember(\model\Member $memberToGetIndexFor) {
        $idToMatch =  $memberToGetIndexFor->getId();
        $index = 0;
        foreach ($this->membersList as $member) {
            if ($member->getId() == $idToMatch) {
                break;
            }
            //Warning: Do not change, keeps track of index position as the foreach loop iterates.
            $index++;
            }

        return $index;
    }



    public function getMemberAssets($formData){
        $memberToGet = $formData["id"];
        $arr = $reg->getData();

        foreach ($arr as $a) {
            if($a["id"] === $memberToGet){
                return $a["assets"];
            }
        }
    }

    public function updateMemberAssets($formData) {
        $memberToGet = $formData["id"];

        foreach ($arr as $a) {
            if($a["id"] === $memberToGet){
                $a["assets"] = $newAssets;
            }
        }
    }

    public function executeMethodOnAsset($methodToExecute, $formData){
        $memberToExecuteFunctionOn = $formData["id"];
        $reg = new RegistryController("../registry.txt");
        $arr = $reg->getData();

        foreach ($arr as $a) {
            if ($a["id"] === $memberToExecuteFunctionOn) {
                $methodToExecute($a);
            }
        }
    }
}