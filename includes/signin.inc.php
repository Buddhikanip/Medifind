<?php
if(isset($_POST["pharmacy"]))
{
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginUser($conn,$username,$pwd);
}
else{
    header('Location:../login.php');
    exit();
}

if(isset($_POST["admin"]))
{
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'functions.inc.php';

    loginAdmin($username,$pwd);
}
else{
    header('Location:../admin/signin.php');
    exit();
}