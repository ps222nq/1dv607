<?php

namespace view;


require_once('././controller/iHTTPCommands.php');

use controller\iURICommand;



class MainView implements iURICommand {
    private $mainController;

    public function __construct() {
        $this->renderMenu();
    }


    public function renderMenu(){
    echo "<a href='" . iURICommand::COMMAND_PREFIX . iURICommand::LIST_COMMAND . "'>List all members </a><br>";
    echo "<a href='" . iURICommand::COMMAND_PREFIX . iURICommand::LIST_VERBOSE_COMMAND . "'>List all members (Detailed)</a><br>";
    echo "<a href='" . iURICommand::COMMAND_PREFIX . iURICommand::ADD_MEMBER_COMMAND . "'>New member</a><br>";
    }
}