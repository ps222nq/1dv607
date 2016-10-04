<?php

namespace controller;

class RegistryController {

    private $path;
    private $data;

    public function __construct($path)
    {
        $this->path = $path;

        try {
            $dataString = file_get_contents("../registry.txt");
            $this->data = json_decode($dataString);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getData() {
        return $this->data;
    }

    public function writeData($arr) {
        $arrToJson = json_encode($arr);
        file_put_contents($this->path, $arrToJson);
    }
}