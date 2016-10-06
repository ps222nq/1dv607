<?php

namespace view;

class MenuView {

    public function __construct() {
        $this->renderMenu();
    }

    public function renderMenu(){
    echo "<a href='?list'>List all members </a><br>";
    echo "<a href='?detailedList'>Detailed list </a>";
        echo $_SERVER['REQUEST_URI'];
        echo $_SERVER['QUERY_STRING'];
        $_SERVER['REQUEST_METHOD'];
    }
}