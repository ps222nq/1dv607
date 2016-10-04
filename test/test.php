<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 11:41
 */

require_once('./BoatTest.php');
require_once('./BoatViewTest.php');
require_once('./MemberViewTest.php');

//Error reporting ON
error_reporting(E_ALL);
ini_set('display_errors', 'On');

new \test\BoatTest();
new \test\BoatViewTest();
//new \test\memberTest();
new \test\MemberViewTest();

?>