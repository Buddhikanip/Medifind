<?php
if(isset($_POST["submit"]))
{
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    header("Location:login.php?error=emptyInput");
    exit();

    loginUser($conn,$username,$pwd);
}
else{
    header('Location:../login.php');
    exit();
}