<?php

echo "Hi";

if(isset($_POST["admin"]))
{
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once '../functions.inc.php';

    echo "Hi 1";

    loginAdmin($username,$pwd);
}
else{
    echo "Hi 2";
    header('Location:../../admin/signin.php');
    exit();
}