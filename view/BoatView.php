<?php

namespace view;

class BoatView {

    public function renderBoatList(array $data) {
        $res = '';
        $res .= "<tr>";
        $res .= "<td>BOAT TYPE</td><td>LENGTH</td>";
        $res .= "</tr>";
        foreach($data as $boat){
        $res .= "<tr class='boatRow'>";
        $res .= "<td>" . $boat->getType(). "</td><td>" . $boat->getLength() . "</td>";
        $res .= "</tr>";
        }

        return $res;
    }
}