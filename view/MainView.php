<?php

namespace view;

require_once('././controller/MemberController.php');
require_once('././controller/RequestController.php');

use \controller\MemberController;
use \controller\requestController;


class MainView {
    private $mainController;

    public static $command = '?command=';
    public static $listCommand = 'list';
    public static $listVerboseCommand = 'detailed_list';
    public static $addMemberCommand = 'add_member';


    public function renderMenu(){
    echo "<a href='" . self::$command . self::$listCommand . "'>List all members </a><br>";
    echo "<a href='" . self::$command . self::$listVerboseCommand . "'>List all members (Detailed)</a><br>";
    echo "<a href='" . self::$command . self::$addMemberCommand . "'>New member</a><br>";
    }
}