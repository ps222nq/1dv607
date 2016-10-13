<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-10
 * Time: 18:28
 */

namespace controller;

require_once('./view/AddMemberView.php');
require_once('./view/MemberView.php');
require_once('./view/UpdateMemberView.php');
require_once('./view/MainView.php');
require_once('./view/AddAssetView.php');
require_once('RequestController.php');
require_once('iHTTPCommands.php');

use model\Member;
use view\MainView;
use view\UpdateMemberView;

class GetRequestController {

    private $structuredURI;
    private $memberController;

    public function __construct()
    {
        $this->memberController = new MemberController();
    }


    public function handleRequest(){
        $this->setStructuredURI();

        if(isset($this->structuredURI['command'])){
            if($this->structuredURI['command'] === iURICommand::UPDATE_MEMBER){
                $member = $this->memberController->getMemberObject($this->structuredURI['id']);
                new UpdateMemberView($member);
            }

            if($this->structuredURI['command'] === iURICommand::DELETE_MEMBER){
                $memberId = $this->structuredURI['id'];
                $this->memberController->deleteMember($memberId);
            }

            if($this->structuredURI['command'] === iURICommand::ADD_MEMBER_COMMAND){
                new \view\AddMemberView();
            };

            if($this->structuredURI['command'] === iURICommand::LIST_COMMAND){
                $mv = new \view\MemberView();
                $members = $this->memberController->getMembersList();
                $mv->renderCompactList($members);
            };
            if($this->structuredURI['command'] === iURICommand::LIST_VERBOSE_COMMAND){
                $mv = new \view\MemberView();
                $members = $this->memberController->getMembersList();
                $mv->renderVerboseList($members);
            };

            if($this->structuredURI['command'] === iURICommand::ADD_ASSET){
                echo 'ASSET VIEW SHOULD BE RENDERED NOW!';
                $av = new \view\AddAssetView($this->structuredURI['id']);
            };
        }
    }

    public function setStructuredURI() {
        //array to keep associations from URI & splits each part of uri. Second split in each part at =
        //left part is the association name and right part the value. For example command=update&id=10 is
        // separated into a array array('command'=>'update','id'=>'10');
        $this->structuredURI = array();

        if(isset($_SERVER['QUERY_STRING'])){
            $uriParts = explode("&", $_SERVER['QUERY_STRING']);
        }


        //http://stackoverflow.com/questions/3833876/create-associative-array-from-foreach-loop-php
        if(count($uriParts) > 0 && strlen($_SERVER['QUERY_STRING']) > 0){
            foreach ($uriParts as $part) {
                $separeatedParts = explode('=',$part);
                $this->structuredURI[$separeatedParts[0]] = $separeatedParts[1];
            }
        }
    }
}