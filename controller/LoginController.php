<?php
include_once '../model/helper.php';

class LoginController{
    public function __construct($post)
    {
        session_start();
        logIn($post);
    }
}
new LoginController($_POST);