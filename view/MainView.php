<?php

namespace view;


require_once('././controller/HTTPCommands.php');

use controller\URICommand;



class MainView {

    public function __construct() {
        $this->renderMenu();
    }


    public function renderMenu(){
    echo "<a href='" . URICommand::COMMAND_PREFIX . URICommand::LIST_COMMAND . "'>List all members </a><br>";
    echo "<a href='" . URICommand::COMMAND_PREFIX . URICommand::LIST_VERBOSE_COMMAND . "'>List all members (Detailed)</a><br>";
    echo "<a href='" . URICommand::COMMAND_PREFIX . URICommand::ADD_MEMBER_COMMAND . "'>New member</a><br>";
    }
}