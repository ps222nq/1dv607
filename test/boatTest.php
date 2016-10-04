<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 11:42
 */
namespace test;

require_once('./model/Boat.php');

class BoatTest {

    public function __construct(){
        $this->shouldCreateBoat();
    }

    private function shouldCreateBoat(){
        $shouldType = "Other";
        $shouldLength = 123;
        $sut = new \model\Boat($shouldType, $shouldLength);
        assert($sut->getType() === $shouldType, "Type is $this->boatClass['type'] but should be $shouldType");
    }

}
