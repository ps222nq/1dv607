<?php

namespace view;

class BoatView {

    public function renderBoats(array $data) {
        foreach($data as $boat){
        $res = "<tr class='boatRow'>";
        $res .= "<td>" . $boat->getId() . "</td><td>" . $boat->getType(). "</td><td>" . $boat->getLength() . "</td>";
        $res .= "</tr>";
        }

        return $res;
    }
}