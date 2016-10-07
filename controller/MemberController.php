<?php

namespace controller;

require_once("././model/Member.php");
require_once ("RegistryController.php");

class MemberController {

    private $membersList;
    private $register;
    private $maxID;

        public function __construct(){
        $this->register = new \controller\RegistryController();
        $this->membersList = $this->register->getData();
        $this->setMaxID();
    }


    private function setMaxID(){
        $maxID = 0;
        $memberID = 0;
        foreach ($this->membersList as $member) {
            $memberID = $member->getId();
            if($memberID > $maxID){
                $maxID = $memberID;
            };

            $this->maxID = $maxID;
        }
    }

    public function getMembersList(){
        return $this->membersList;
    }

    //TODO: figure out why this is not adding a new member
    public function addMember($formData) {
        $message = "";
        try {
            $name = $formData["name"];
            $personalNumber = $formData["personalnumber"];
            $id = $this->maxID + 1;
            $newMember  = new \model\Member($name, $personalNumber, $id);

            if(!$this->isDuplicate($newMember)){
                array_push($this->membersList, $newMember);
                $message .= "Created new Member: " . $newMember->toString();
                $this->register->writeData($this->membersList);
            } else {
                $message .= "Member already exists: " . $newMember->toString();
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

    public function updateMember($formData) {
        try{
            echo "working call";
            var_dump($formData);
            $id = $formData['id'];
            $name = $formData['name'];
            $personalNumber = $formData['personalNumber'];

            foreach ($this->membersList as $member) {
                if($id === $member->getId()){
                    $member->setPersonalNumber($personalNumber);
                    $member->setName($name);
                }
            }
            $this->register->writeData($this->membersList);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function deleteMember($id) {
        $memberToDelete = $id;

        foreach ($this->membersList as $member) {
            if ($member->getId() === $memberToDelete) {
                unset($member);
            }
        }
    }

    public function getMemberInfo($formData) {
        $memberToGet = $formData["id"];
        $reg = new RegistryController("../registry.txt");
        $arr = $reg->getData();

        foreach ($arr as $a) {
            if($a["id"] === $memberToGet){
                return $a;
            }
        }
    }

    public function getMemberAssets($formData){
        $memberToGet = $formData["id"];
        $reg = new RegistryController("../registry.txt");
        $arr = $reg->getData();

        foreach ($arr as $a) {
            if($a["id"] === $memberToGet){
                return $a["assets"];
            }
        }
    }

    public function updateMemberAssets($formData) {
        $memberToGet = $formData["id"];
        $newAssets = $formData["assets"];
        $reg = new RegistryController("../registry.txt");
        $arr = $reg->getData();

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