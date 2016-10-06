<?php

namespace controller;

class RegistryController {

    private static $path = './controller/register/registry.txt';
    private $data;


    public function  __construct(){
        if(!$this->isExistingFilepath(self::$path)) {
            $this->writeData(array());
        }
    }


    private function isExistingFilepath($path) {
        if(!file_get_contents($path)){
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function getData() {
        try {
            $dataString = file_get_contents(self::$path);
            $this->data = json_decode($dataString);
            return $this->data;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function writeData($arr) {
        $arrToJson = json_encode($arr);
        file_put_contents(self::$path, $arrToJson);
    }

}