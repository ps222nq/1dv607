<?php

//TODO: Include views

require_once('./view/MainView.php');
require_once('./controller/RequestController.php');
//Error reporting ON
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$mv = new \view\MainView();
$rc = new \controller\RequestController();

//TODO: Instantiate view objects