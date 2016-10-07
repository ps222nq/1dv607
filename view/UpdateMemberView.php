<?php

namespace view;

class AddMemberView {

    public function __construct($member){
        $this->renderUpdateForm($member);
    }


//TODO: Add new updatememberform, set name on submit to upDateMemberForm, should take Member object as input and populate inputfields with values from object.
    public function renderUpdateForm($member){
        $res =  "<form action='index.php'  method='post'>";
        $res .= "<input type='hidden' name='id' value='" . $member->getId() . "'><br>";
        $res .= "Name <input type='text' name='name' value ='". $member->getName() . "'><br>";
        $res .= "Personal number <input type='text' name='personalnumber' value='" . $member->getPersonalNumber() . "'><br>";
        $res .= "<input type='submit' value='update member' name='updateMemberForm'>";
        $res .= "</form>";

        echo $res;
    }
}
