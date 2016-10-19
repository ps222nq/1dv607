<?php

namespace view;

use controller\URICommand;

require_once('./controller/HTTPCommands.php');

class BoatView {
    private $member;
    private $assets;
    private $boatNumber;

    public function __construct($member)
    {
        $this->member = $member;
        $this->assets = $member->getAssets();
    }

    public function renderBoatList() {

        $res = '';
        $res .= "<tr>";
        $res .= "<td>BOAT TYPE</td><td>LENGTH</td>";
        $res .= "</tr>";
        foreach($this->assets as $boat){
        //Warning: Do not move this line count, will be used for index-decision in memberController
        $this->boatNumber++;
        $res .= "<tr class='boatRow'>";
        $res .= "<td>" . $boat->getType(). "</td><td>" . $boat->getLength() . "</td>";
        $res .= $this->addLinks();
        $res .= "</tr>";
        }

        return $res;
    }

    public function addLinks() {
        $res = "<td><a href='" . URICommand::COMMAND_PREFIX . URICommand::DELETE_ASSET . URICommand::ID_PREFIX . $this->member->getId() . URICommand::ASSET_NUMBER_PREFIX . $this->boatNumber . "'> Delete </td>";
        $res .= "<td><a href='" . URICommand::COMMAND_PREFIX . URICommand::UPDATE_ASSET . URICommand::ID_PREFIX .  $this->member->getId() . URICommand::ASSET_NUMBER_PREFIX . $this->boatNumber . "'> Edit </td>";
        return $res;
    }
}