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
require_once('./view/UpdateMemberView.php');
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

        if($_SERVER['QUERY_STRING'] === 'update'){
            $members = $this->memberController->getMembersList();
            $uv = new \view\UpdateMemberView($members["0"]);
        };


    }

    public function handlePosts(){
        try {
            if(isset($_POST['addMemberForm'])) {
                return $this->memberController->addMember($_POST);
            }
            // TODO: Check if working
            if(isset($_POST['updateMemberForm'])){
                try{
                    echo "reading edit command";
                    echo $this->memberController->updateMember($_POST['id']);
                } catch (\Exception $e) {
                    echo "Error: " . $e->getMessage();
                }

            }
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}