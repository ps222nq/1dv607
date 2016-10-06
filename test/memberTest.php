<?php

namespace test;

use model\Member;

require_once("../model/Member.php");

class MemberTest {

public function __construct()
{
    $this->shouldCreateMember();
}

private function shouldCreateMember() {
    $expected = "Glenn";
    $testMember = new Member("Glenn", "19000101-0101", 1);
    $testName = $testMember->getName();
    if($testName === $expected){
        echo "shouldCreateMember working";
    }
    assert($expected === $testName, "$testName returned, $expected was expected");
}
}