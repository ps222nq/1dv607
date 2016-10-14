<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-14
 * Time: 16:11
 */

namespace view;


use model\iBoatTypeRestriction;

require_once('././model/iBoatTypeRestriction.php');

class UpdateAssetView implements iBoatTypeRestriction
{
    private $boatType;
    private $assetNumber;
    private $asset;
    private $id;

    public function __construct($member, $assetNumber, $asset){
        $this->id = $member->getId();
        $this->boatType = $asset->getType();
        $this->assetNumber = $assetNumber;
        $this->asset = $asset;

        $this->renderUpdateForm();

    }


    public function renderUpdateForm() {
            $res  =  "<form action='index.php'  method='post'>";
            $res .= "<input type='hidden' name='id' value='" . $this->id . "'><br>";
            $res .= "<input type='hidden' name='assetNumber' value='" . $this->assetNumber . "'><br>";
            $res .= "Type <select name='type'><br>";
            $res .= "<option value='" . $this->checkIfPreSelected(iBoatTypeRestriction::BOAT_TYPE_1) .  ">" . iBoatTypeRestriction::BOAT_TYPE_1 . "</option>";
            $res .= "<option value='" . $this->checkIfPreSelected(iBoatTypeRestriction::BOAT_TYPE_2) . ">" . iBoatTypeRestriction::BOAT_TYPE_2 . "</option>";
            $res .= "<option value='" . $this->checkIfPreSelected(iBoatTypeRestriction::BOAT_TYPE_3) . ">" . iBoatTypeRestriction::BOAT_TYPE_3 . "</option>";
            $res .= "<option value='" . $this->checkIfPreSelected(iBoatTypeRestriction::BOAT_TYPE_4) . ">" . iBoatTypeRestriction::BOAT_TYPE_4 . "</option>";
            $res .= "</select><br>";
            $res .= "Length <input type='text' name='length' value='" . $this->asset->getLength() . "'><br>";
            $res .= "<input type='submit' value='save changes' name='updateAssetForm'>";
            $res .= "<form>";

            echo $res;

    }

    private function checkIfPreSelected($compareToTypeValue){
        if($compareToTypeValue === $this->boatType) {
            return $compareToTypeValue . "' selected";
        } else {
            return $compareToTypeValue . "'";
        }
    }

}

