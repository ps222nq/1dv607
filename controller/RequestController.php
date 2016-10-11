<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-06
 * Time: 15:51
 */
namespace controller;


require_once('PostRequestController.php');
require_once('GetRequestController.php');
require_once('MemberController.php');


class requestController {

    private $postRequestController;
    private $getRequestController;
    protected $memberController;


    public function __construct()
    {
        new \view\MainView();

        $this->memberController = new MemberController();
        $this->postRequestController = new PostRequestController();
        $this->getRequestController = new GetRequestController();

        $this->handleRequestDependingOnPostOrGet();
    }


    private function handleRequestDependingOnPostOrGet(){
        if(!empty($_POST)) {
            $this->postRequestController->handleRequest();
        } else if(!empty($_GET)) {
            $this->getRequestController->handleRequest();
        }
    }






}
