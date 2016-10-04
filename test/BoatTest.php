<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 11:42
 */
namespace test;

require_once('../model/Boat.php');

class BoatTest {

    public function __construct(){
        $this->shouldCreateBoat();
        $this->shouldThrowExceptionInvalidFormatParam1();
        $this->shouldThrowExceptionInvalidFormatParam2();
        $this->shouldReturnLength();
        $this->shouldReturnType();
    }

    private function shouldCreateBoat(){
        $shouldType = "Other";
        $shouldLength = 123;
        $sut = new \model\Boat($shouldType, $shouldLength);
        assert($sut->getType() === $shouldType, "Type is but should be $shouldType");
    }

    private function shouldThrowExceptionInvalidFormatParam1(){
        $shouldType = 123;
        $shouldLength = 123;
        $expected = 'Type must be a string';
        try{
            new \model\Boat($shouldType, $shouldLength);
        } catch(\Exception $exception) {
            assert($exception->getMessage() === $expected, 'Respons' . $exception . ':    ' . $expected . '  was expected');
        }
    }

    private function shouldThrowExceptionInvalidFormatParam2(){
        $shouldType = "Other";
        $shouldLength = "Other";
        $expected = 'Length must be numeric';
        try{
            new \model\Boat($shouldType, $shouldLength);
        } catch(\Exception $exception) {
            assert($exception->getMessage() === $expected, 'Respons' . $exception . ':    ' . $expected . '  was expected');
        }
    }

    private function shouldReturnLength(){
        $expected = 10;
        $sut = new \model\Boat("Type", $expected);
        $returns = $sut->getLength();
        assert($returns === $expected, "$returns is returned, $expected was expected");
    }

    private function shouldReturnType(){
        $expected = "BoatType";
        $sut = new \model\Boat($expected, 10);
        $returns = $sut->getType();
        assert($returns === $expected, "$returns is returned, $expected was expected");
    }

}
