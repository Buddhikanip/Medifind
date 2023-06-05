<?php
if(isset($_POST["submit"]))
{
    $pname= $_POST["pname"];
    $oname= $_POST["oname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];
    $plicense = $_POST["plicense"];
    $pwd = $_POST["pwd"];
    $pwdr = $_POST["pwdr"];
    $status = 0;

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd,$pwdr);
    $uidExists = uidExists($conn,$plicense,$email);

    if($invalidEmail !== false)
    {
        header("Location:../pharmacy/signup.php?error=invalidEmail");
        exit();
    }
    if($pwdMatch !== false)
    {
        header("Location:../pharmacy/signup.php?error=pwdDontMatch");
        exit();
    }
    if($uidExists !== false)
    {
        header("Location:../pharmacy/signup.php?error=userNameTaken");
        exit();
    }

    createUser($conn,$pname,$oname,$email,$address,$tel,$plicense,$pwd,$status);
    
}
else{
    header('Location:../pharmacy/signup.php');
    exit();
}
