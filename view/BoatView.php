<?php

namespace view;

use controller\iURICommand;

require_once('./controller/iHTTPCommands.php');

class BoatView implements iURICommand {
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
        $res = "<td><a href='" . iURICommand::COMMAND_PREFIX . iURICommand::DELETE_ASSET . iURICommand::ID_PREFIX . $this->member->getId() . iURICommand::ASSET_NUMBER_PREFIX . $this->boatNumber . "'> Delete </td>";
        $res .= "<td><a href='" . iURICommand::COMMAND_PREFIX . iURICommand::UPDATE_ASSET . iURICommand::ID_PREFIX .  $this->member->getId() . iURICommand::ASSET_NUMBER_PREFIX . $this->boatNumber . "'> Edit </td>";
        return $res;
    }
}