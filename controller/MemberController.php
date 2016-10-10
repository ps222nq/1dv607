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

    public function updateMemberNameAndPersonalNumber($formData) {
        try{
            $id = $formData['id'];
            $personalNumber = $formData['personalNumber'];
            $name = $formData['name'];
            $memberToUpdate = $this->getMember($id);

            $memberToUpdate->setName($name);
            $memberToUpdate->setPersonalNumber($personalNumber);

            $this->register->writeData($this->membersList);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function deleteMember($id) {
        $count = count($this->membersList);
        for($i = 0; $i < $count; $i++) {
            var_dump($i);
            echo 'ID (passed to deleteMember):   ' . $id . '<br>';
            //var_dump($this->membersList[1]->getId());
            var_dump($this->membersList);
            if(isset($this->membersList[$i])){
            if ($this->membersList[$i]->getId() == $id){
                echo "UNSET" . $this->membersList[$i]->toString();
                unset($this->membersList[$i]);
            }

            }

        }


        $this->register->writeData($this->membersList);

    }

    public function getMember($id) {
        foreach ($this->membersList as $member) {
            if($member->getId() == $id){
                return $member;
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