<?php

namespace view;

require_once('BoatView.php');


class MemberView {

    public function renderCompactList($data) {
        $res = "<table>";

        foreach($data as $d){
            $res .= "<tr class='memberRow'>";
            $res .= "<td>" . $d["name"]. "</td><td>" . $d["id"] . "</td><td>" . count($d["assets"]) . "</td>";
            $res .= "</tr>";
        }

        $res .= "</table>";

        return $res;
    }


    public function renderVerboseList($data) {
        $boatView = new BoatView();

        $res = "<table>";

        foreach($data as $d){
            $res .= "<tr class='memberRow'>";
            $res .= "<td>" . $d["name"]. "</td><td>" . $d["personalNumber"] . "</td><td>" . $d["id"] . "</td>";
            $res .= "</tr>";
            $res .= $boatView->renderBoatList($d["assets"]);
        }

        $res .= "</table>";

        return $res;
    }
}