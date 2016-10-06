<?php

namespace view;

class BoatView {

    public function renderBoatList(array $data) {
        $res = '';
        foreach($data as $boat){
        $res = "<tr class='boatRow'>";
        $res .= "<td>" . $boat->getId() . "</td><td>" . $boat->getType(). "</td><td>" . $boat->getLength() . "</td>";
        $res .= "</tr>";
        }

        echo $res;
    }
}