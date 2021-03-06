<?php

/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 15:58
 */
namespace test;

require_once('../view/BoatView.php');
require_once('../model/Boat.php');

class BoatViewTest {


    public function __construct()
    {
        $this->shouldReturnHTMLString();
    }

    private function shouldReturnHTMLString(){
        $type = "Other";
        $length = 100;
        $boat = new Boat($type, $length);
        $boatsArray = array();
        array_push($boatsArray, $boat);
        $view = new BoatView();
        $expected = "<tr class='boatRow'>";
        $expected .= "<td>" . $boat->getId() . "</td><td>" . $boat->getType(). "</td><td>" . $boat->getLength() . "</td>";
        $expected .= "</tr>";
        $res = $view->renderBoatList();
        if($res === $expected){
            echo "<li>shouldReturnHTMLString working!</li>";
        }
        assert($res === $expected, 'Rendered:' . $res . ' expected ' . $expected);

    }


}