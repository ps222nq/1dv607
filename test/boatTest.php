<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 11:42
 */

require_once('../model/Boat.php');

public function boatTest(){

    private $boatClass;

    public function _{
        $this->init();
    }

    public function init(){
        $this->boatClass = new model\Boat("Other", 123);
    }

    public function shouldCreateBoat(){
        $shouldType = "Other";
        $boat = new model\Boat($shouldType, 123);
        assert($this->boatClass['type'] !== "Other", "Type is $this->boatClass['type'] but should be $shouldType");
    }
}