<?php

namespace view;

class BoatView {
    public function renderBoatDetailHTML(\model\Boat $boat) {
        return '<li>' . 'Type: ' . $boat->getType() . ', Length: ' . $boat->getLength() .
        '<a href="index.php?command=edit&id=' . $boat->getId() . '">Edit</a> <a href="index.php?command=delete&id=' . $boat->getId() . '">Delete</a> </li>';;
    }
}