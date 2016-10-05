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
        $boat = new \model\Boat($type, $length);
        $view = new \view\BoatView();
        //Inspired by http://www.killersites.com/community/index.php?/topic/1969-basic-php-system-vieweditdeleteadd-records/
        $expected = '<li>' . 'Type: ' . $boat->getType() . ', Length: ' . $boat->getLength() .
            '<a href="index.php?command=edit&id=' . $boat->getId() . '">Edit</a> <a href="index.php?command=delete&id=' . $boat->getId() . '">Delete</a> </li>';
        $res = $view->renderBoatDetailHTML($boat);
        assert($res === $expected, 'Rendered:' . $res . ' expected ' . $expected);
    }


}