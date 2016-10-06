<?php

namespace view;

require_once('BoatView.php');


class MemberView {

    public function renderCompactList($data) {
        $res = "<table>";

        foreach($data as $member){
            $res .= "<tr class='memberRow'>";
            $res .= "<td>" . $member->getName(). "</td><td>" . $member->getId() . "</td><td>" . $member->getAssetCount() . "</td>";
            $res .= "</tr>";
        }

        $res .= "</table>";

        echo $res;
    }


    public function renderVerboseList($data) {
        $boatView = new BoatView();

        $res = "<table>";

        foreach($data as $member){
            $res .= "<tr class='memberRow'>";
            $res .= "<td>" . $member->getName() . "</td><td>" . $member->getPersonalNumber() . "</td><td>" . $member->getId() . "</td>";
            $res .= "</tr>";
            $res .= $boatView->renderBoatList($member->getAssets());
        }

        $res .= "</table>";

        echo $res;
    }
}