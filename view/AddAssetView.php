<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-13
 * Time: 11:45
 */

namespace view;


use model\iBoatTypeRestriction;

class AddAssetView implements iBoatTypeRestriction
{

    public function __construct($id){
        $this->renderRegistrationForm($id);
    }

    private function renderRegistrationForm($id){
        $res  =  "<form action='index.php'  method='post'>";
        $res .= "<input type='hidden' name='id' value='" . $id . "'><br>";
        $res .= "Type <select name='type'><br>";
        $res .= "<option value='" . iBoatTypeRestriction::BOAT_TYPE_1 . "'>" . iBoatTypeRestriction::BOAT_TYPE_1 . "</option>";
        $res .= "<option value='" . iBoatTypeRestriction::BOAT_TYPE_2 . "'>" . iBoatTypeRestriction::BOAT_TYPE_2 . "</option>";
        $res .= "<option value='" . iBoatTypeRestriction::BOAT_TYPE_3 . "'>" . iBoatTypeRestriction::BOAT_TYPE_3 . "</option>";
        $res .= "<option value='" . iBoatTypeRestriction::BOAT_TYPE_4 . "'>" . iBoatTypeRestriction::BOAT_TYPE_4 . "</option>";
        $res .= "</select><br>";
        $res .= "Length <input type='text' name='length'><br>";
        $res .= "<input type='submit' value='add asset' name='addAssetForm'>";
        $res .= "<form>";

        echo $res;
    }

}