<?php

namespace view;

require_once("../controller/MemberController.php");

class MemberView {
    public function renderMemberDetailsHTML(\model\Member $member){
        return '<ul><li>' . $member->getId(). ' ' .$member->getName() .' '. $member->getNumberOfAssets() . '</li></ul>';
    }
}