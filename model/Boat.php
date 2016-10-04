<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 09:56
 */

namespace model;


class Boat {
    private $id;
    private $type;
    private $length;

    public function __construct($type, $length)
    {
        //validate parameters
        $this->validateType($type);
        $this->validateLength($length);

        $this->type = $type;
        $this->length = $length;
    }


    public function toString(){
        return "Type: " . $this->type . ", Length: " . $this->length;
    }


    public function getId(){
        return $this->id;
    }

    public function setLength($length){
        $this->validateLength();
        $this->length = $length;
    }


    private function validateLength($length){
        if (!is_numeric($length)) {
            throw new \Exception("Length must be numeric");
        }
    }


    public function getLength(){
        return $this->length;
    }


    public function setType($type) {
        $this->validaType($type);
        $this->type = $type;
    }


    private function validateType($type){
        if (!is_string($type)) {
            throw new \Exception("Type must be a string");
        }
    }


    public function getType(){
        return $this->type;
    }
}