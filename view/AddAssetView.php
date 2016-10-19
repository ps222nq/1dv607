<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-13
 * Time: 11:45
 */

namespace view;

use model\BoatTypeRestriction;

class AddAssetView {

    public function __construct($id){
        $this->renderRegistrationForm($id);
    }

    private function renderRegistrationForm($id){
        $res  =  "<form action='index.php'  method='post'>";
        $res .= "<input type='hidden' name='id' value='" . $id . "'><br>";
        $res .= "Type <select name='type'><br>";
        $res .= "<option value='" . BoatTypeRestriction::BOAT_TYPE_1 . "'>" . BoatTypeRestriction::BOAT_TYPE_1 . "</option>";
        $res .= "<option value='" . BoatTypeRestriction::BOAT_TYPE_2 . "'>" . BoatTypeRestriction::BOAT_TYPE_2 . "</option>";
        $res .= "<option value='" . BoatTypeRestriction::BOAT_TYPE_3 . "'>" . BoatTypeRestriction::BOAT_TYPE_3 . "</option>";
        $res .= "<option value='" . BoatTypeRestriction::BOAT_TYPE_4 . "'>" . BoatTypeRestriction::BOAT_TYPE_4 . "</option>";
        $res .= "</select><br>";
        $res .= "Length <input type='text' name='length'><br>";
        $res .= "<input type='submit' value='add asset' name='addAssetForm'>";
        $res .= "<form>";

        echo $res;
    }

}