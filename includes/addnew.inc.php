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
    echo $dname;
    
    if(checkDname($dname))
    {
        header('Location:../pharmacy/addnew.php?error=dname');
        exit();
    }    
    if(!checkqty($qty))
    {
        header('Location:../pharmacy/addnew.php?error=qty');
        exit();
    }

    addnew($conn,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice);
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
        header("Location:../pharmacy/update.php?error=dname&id=$id");
        exit();
    }

    update($conn,$id,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice);
}
else{
    header('Location:../pharmacy/addnew.php');
    exit();
}