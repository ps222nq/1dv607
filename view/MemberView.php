<?php

namespace view;

require_once('BoatView.php');
require_once('./controller/iHTTPCommands.php');

use \controller\iURICommand;

class MemberView implements iURICommand {

    public function renderCompactList($data) {
        $res = "<table>";

        foreach($data as $member){
            $res .= "<tr class='memberRow'>";
            $res .= "<td>" . $member->getName(). "</td><td>" . $member->getId() . "</td><td>" . $member->getAssetCount() . "</td>";
            $res .= $this->addLinks($member);
            $res .= "</tr>";
        }

        $res .= "</table>";

        echo $res;
    }


    public function renderVerboseList($data) {
        $boatView = new BoatView();

        $res = "<table>";

        foreach($data as $member){
            $res .= "<tr class='memberRow'>";
            $res .= "<td>" . $member->getName() . "</td><td>" . $member->getPersonalNumber() . "</td><td>" . $member->getId() . "</td>";
            $res .= $this->addLinks($member);
            $res .= "</tr>";
            $res .= $boatView->renderBoatList($member->getAssets());
        }

        $res .= "</table>";

        echo $res;
    }

    public function addLinks($member) {
        $res = "<td><a href='" . iURICommand::COMMAND_PREFIX . iURICommand::DELETE_MEMBER . iURICommand::ID_PREFIX . $member->getId() . "'> Delete </td>";
        $res .= "<td><a href='" . iURICommand::COMMAND_PREFIX . iURICommand::UPDATE_MEMBER . iURICommand::ID_PREFIX .  $member->getId() . "'> Edit </td>";
        $res .= "<td><a href='" . iURICommand::COMMAND_PREFIX . iURICommand::ADD_ASSET . iURICommand::ID_PREFIX . $member->getId() . "'> Add asset </td>";

        return $res;
    }
}