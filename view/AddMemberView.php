<?php
/**
 * Created by PhpStorm.
 * User: sebastiangustavsson
 * Date: 2016-10-06
 * Time: 15:40
 */

namespace view;


class AddMemberView
{
    public function __construct(){
        $this->renderRegistrationForm();
    }

    public function renderRegistrationForm(){
        $res =  "<form action='index.php'  method='post'>";
        $res .= "Name <input type='text' name='name'><br>";
        $res .= "Personal number <input type='text' name='personalnumber'><br>";
        $res .= "<input type='submit' value='add member' name='addMemberForm'>";
        $res .= "<form>";

        echo $res;
    }

}