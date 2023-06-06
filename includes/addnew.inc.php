<?php
if(isset($_POST["submit"]))
{
    $dname = $_POST["dname"];
    $manu = $_POST["manu"];
    $sup = $_POST["sup"];
    $ndc = $_POST["ndc"];
    $exp = $_POST["exp"];
    $qty = $_POST["qty"];
    $uprice = $_POST["uprice"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(checkDname($dname))
    {
        header('Location:../pharmacy/addnew.php?error=dname');
    }    
    if(!checkqty($qty))
    {
        header('Location:../pharmacy/addnew.php?error=qty');
    }

    // addnew($conn,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice);
}
else if(isset($_POST["update"]))
{
    $id = $_POST["id"];
    $dname = $_POST["dname"];
    $manu = $_POST["manu"];
    $sup = $_POST["sup"];
    $ndc = $_POST["ndc"];
    $exp = $_POST["exp"];
    $qty = $_POST["qty"];
    $uprice = $_POST["uprice"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(checkDname($dname))
    {
        header('Location:../phamacy/addnew.php?error=dname');
    }

    update($conn,$id,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice);
}
else{
    header('Location:../phamacy/addnew.php');
    exit();
}