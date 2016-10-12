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

    //Warning: Read more about serialize/unserialize and json_decode/encode before changing to alternative method.
    //http://stackoverflow.com/questions/804045/preferred-method-to-store-php-arrays-json-encode-vs-serialize
    public function getData() {
        try {
            $dataString = file_get_contents(self::$path);
            $unserializedData = unserialize($dataString);
            $this->data = $unserializedData;
            return $this->data;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function writeData($arr) {
        $serializedData = serialize($arr);
        file_put_contents(self::$path, $serializedData);
    }

}