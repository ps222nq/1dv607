<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-06
 * Time: 15:51
 */
namespace controller;
require_once('./view/AddMemberView.php');
require_once('./view/MemberView.php');
require_once('MemberController.php');
class requestController {
    private $memberController;
    public function __construct()
    {
        $this->memberController = new MemberController();
        $this->handleURI();
        if(!empty($_POST)) {
            $this->handlePosts();
        }
    }
    public function handleURI(){
        //array to keep associations from URI & splits each part of uri. Second split in each part at =
        //left part is the association name and right part the value. For example command=update&id=10 is
        // separated into a array array('command'=>'update','id'=>'10');
        $structuredURI = array();
        //http://stackoverflow.com/questions/3833876/create-associative-array-from-foreach-loop-php
        $uriParts = explode("&", $_SERVER['QUERY_STRING']);
        foreach ($uriParts as $part) {
            $separeatedParts = explode('=',$part);
            $structuredURI[$separeatedParts[0]] = $separeatedParts[1];
        }
        if($_SERVER['QUERY_STRING'] === 'addMember'){
            new \view\AddMemberView();
        };
        if($_SERVER['QUERY_STRING'] === 'list'){
            $mv = new \view\MemberView();
            $members = $this->memberController->getMembersList();
            $mv->renderCompactList($members);
        };
        if($_SERVER['QUERY_STRING'] === 'detailedList'){
            $mv = new \view\MemberView();
            $members = $this->memberController->getMembersList();
            $mv->renderVerboseList($members);
        };
    }
    public function handlePosts(){
        try {
            if(isset($_POST['addMemberForm'])) {
                return $this->memberController->addMember($_POST);
            }
            // TODO: Check if working
            if(isset($_POST['uppdateMemberForm'])){
                return $this->memberController->updateMember($_POST);
            }
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}