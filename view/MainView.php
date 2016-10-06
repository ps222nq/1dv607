<?php

namespace view;

require_once('././controller/MemberController.php');
require_once('././controller/RequestController.php');

use \controller\MemberController;
use \controller\requestController;


class MainView {
    private $mainController;

    public function __construct() {
        $this->renderMenu();
        $this->mainController = new requestController();
    }

    public function renderMenu(){
    echo "<a href='?list'>List all members </a><br>";
    echo "<a href='?detailedList'>List all members (Detailed)</a><br>";
    echo "<a href='?addMember'>New member</a><br>";
    }
}