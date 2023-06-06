<?php
if(isset($_POST["submit"]))
{
    $id = $_POST["id"];
    $pname= $_POST["pname"];
    $oname= $_POST["oname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];
    $plicense = $_POST["plicense"];
    $pwd = $_POST["pwd"];
    $status = $_POST["status"];

    require_once '../dbh.inc.php';
    require_once '../functions.inc.php';

    createPham($conn,$pname,$oname,$email,$address,$tel,$plicense,$pwd,$id);
    
}
else{
    header('Location:../admin/signin.php');
    exit();
}