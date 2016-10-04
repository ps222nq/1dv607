<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 09:56
 */

namespace model;


class Boat
{
    private $type;
    private $length;

    public function __construct($type, $length) {

        if(!is_string($type)){
            throw new \Exception("$type must be of type string");
        }

        if(!is_numeric($length)){
            throw new \Exception("$length must be numeric");
        }

        $this->type = $type;
        $this->length = $length;
    }
}