<?php

if(isset($_POST["admin"]))
{
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once '../functions.inc.php';

    loginAdmin($username,$pwd);
}
else{
    header('Location:../../admin/signin.php');
    exit();
}