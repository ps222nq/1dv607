<?php

namespace view;

require_once('BoatView.php');

use \controller\URICommand;

class MemberView {
    private $boatView;


    public function renderCompactList($data) {
        $res = "<table>";
        $res .= "<tr>";
        $res .= "<th>NAME</th><th>ID</th><th>No Of Assets</th>";
        $res .= "</tr>";
        if(count($data) !== 0){
            foreach($data as $member){
                $res .= "<tr class='memberRow'>";
                $res .= "<td>" . $member->getName() . "</td><td>" . $member->getId() . "</td><td>" . $member->getAssetCount() . "</td>";
                $res .= $this->addLinks($member);
                $res .= "</tr>";
            }
        }

        $res .= "</table>";

        echo $res;
    }


    public function renderVerboseList($data) {
        $res = "<table>";
        if(count($data) !== 0){
            foreach($data as $member){
                $res .= "<tr>";
                $res .= "<td>NAME</td><td>PERSONAL NUMBER</td><td>ID</td>";
                $res .= "</tr>";
                $this->boatView = new \view\BoatView($member);
                $res .= "<tr class='memberRow'>";
                $res .= "<td>" . $member->getName() . "</td><td>" . $member->getPersonalNumber() . "</td><td>" . $member->getId() . "</td>";
                $res .= $this->addLinks($member);
                $res .= "</tr>";
                $res .= $this->boatView->renderBoatList();
            }
        }

        $res .= "</table>";

        echo $res;
    }

    public function addLinks($member) {
        $res = "<td><a href='" . URICommand::COMMAND_PREFIX . URICommand::DELETE_MEMBER . URICommand::ID_PREFIX . $member->getId() . "'> Delete </td>";
        $res .= "<td><a href='" . URICommand::COMMAND_PREFIX . URICommand::UPDATE_MEMBER . URICommand::ID_PREFIX .  $member->getId() . "'> Edit </td>";
        $res .= "<td><a href='" . URICommand::COMMAND_PREFIX . URICommand::ADD_ASSET . URICommand::ID_PREFIX . $member->getId() . "'> Add asset </td>";

        return $res;
    }
}