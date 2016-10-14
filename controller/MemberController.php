<?php

namespace controller;

use model\Boat;
use model\iBoatTypes;

require_once("././model/Member.php");
require_once('././model/Boat.php');
require_once("RegistryController.php");

class MemberController {

    private $membersList;
    private $register;

        public function __construct(){
        $this->register = new \controller\RegistryController();
        $this->membersList = $this->register->getData();
    }


    public function getMembersList(){
        return $this->membersList;
    }

    public function getMemberObject($id) {
        $idAsInt = intval($id);
        foreach ($this->membersList as $member) {
            if($member->getId() == $idAsInt){
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

    public function updateMemberNameAndPersonalNumber($formData) {
        try{
            $id = $formData['id'];
            $personalNumber = $formData['personalNumber'];
            $name = $formData['name'];
            $memberToUpdate = $this->getMemberObject($id);

            $memberToUpdate->setName($name);
            $memberToUpdate->setPersonalNumber($personalNumber);

            $this->register->writeData($this->membersList);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function deleteMember($id) {
        $member = $this->getMemberObject($id);
        $index = $this->getListIndexForMember($member);

        //Warning: Do not remove this, added due to unexpected behaviour from unset method when when only one element in array.
        if(count($this->membersList) === 1 ){
            unset($this->membersList);
            $this->membersList = array();
        }
        unset($this->membersList[$index]);

        $this->register->writeData($this->membersList);
    }

    private function getListIndexForMember(\model\Member $memberToGetIndexFor) {
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

    public function addMemberAsset(){
        $memberToGet = $_POST['id'];
        $member = $this->getMemberObject($memberToGet);
        $member->addAsset(new Boat($_POST['type'], $_POST['length']));
        $this->register->writeData($this->membersList);
    }

    public function getMemberAssets($id){
        $memberToGet = $id;
        $member = $this->getMemberObject($memberToGet);
        $assets = $member->getAssets();
        return $assets;
    }

    public function deleteMemberAsset($id, $assetNumber){
        $memberId = $id;
        $assetIndexPosition = $assetNumber - 1;
        $member = $this->getMemberObject($memberId);
        $member->deleteAssetAtIndexPosition($assetIndexPosition);
        $this->register->writeData($this->membersList);
    }

    public function updateMemberAsset() {
        $memberToGet = $_POST[iURICommand::ID];
        $member = $this->getMemberObject($memberToGet);
        $assetIndex = $_POST[iURICommand::ASSET_NUMBER];
        $boat = new \model\Boat($_POST['type'], $_POST['length']);
        $member->replaceAssetAtIndexPositionWithAsset($assetIndex, $boat);
        $this->register->writeData($this->membersList);
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