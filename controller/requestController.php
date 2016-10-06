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
                echo $this->memberController->addMember($_POST);
            }
        } catch (\Exception $exception){
            echo $exception->getMessage();
        }
    }
}