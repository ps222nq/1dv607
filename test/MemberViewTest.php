<?php

/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-04
 * Time: 19:46
 */
namespace test;

require_once('../view/MemberView.php');
require_once ('../model/Member.php');

class MemberViewTest
{
    public function __construct()
    {
        $this->shouldReturnHTMLString();
    }

    private function shouldReturnHTMLString() {
        $member = new \model\Member("Test Testsson", "19002233-4455", 100);
        $view = new \view\MemberView($member);
        $res = $view->renderMemberDetailsHTML($member);
        $expected = '<ul><li>' . $member->getId(). ' ' .$member->getName() .' '. $member->getAssetCount() . '</li></ul>';

        if($res === $expected) {
            echo "<li>MemberView shouldReturnHTMLString working</li>";
        }

        assert($res === $expected, 'Rendered: ' . $res . '  BUT ' . $expected . '   was expected' );
    }
}