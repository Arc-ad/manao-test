<?php

include_once '../model/helper.php';


class RegisterController{
    public function __construct($post)
    {
        session_start();
        validReg($post);
    }
}
new RegisterController($_POST);
