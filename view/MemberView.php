<?php

namespace view;

require_once("../controller/MemberController.php");

class MemberView {
    public function renderMemberDetailsHTML(\model\Member $member){
        return '<ul><li>' . $member->getId(). ' ' .$member->getName() .' '. $member->getNumberOfAssets() . '</li></ul>';
    }

    public function renderCompactList($data) {
        $res = "<table>";

        foreach($data as $d){
            $res .= "<tr>";
            $res .= "<td>" . $d["name"]. "</td><td>" . $d["assets"] . "</td>";
            $res .= "</tr>";
        }

        $res .= "</table>";

        return $res;
    }

}