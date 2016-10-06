<?php

/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-06
 * Time: 15:51
 */

namespace controller;

require_once('./view/AddMemberView.php');
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
            $this->renderCompactList();
        };

        if($_SERVER['QUERY_STRING'] === 'detailedList'){
            $compactList = new \view\MemberView();
            $compactList->renderVerboseList();
        };
    }

    public function handlePosts(){
        if(isset($_POST['addMemberForm'])) {
            $this->memberController->addMember($_POST);
        }
    }
}