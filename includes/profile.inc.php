<?php
if(isset($_POST['profile']))
{
    $id = $_POST['id'];
    $pname = $_POST['pname'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $web = $_POST['web'];
    $hor = $_POST['hor'];
    $oname = $_POST['oname'];
    $oaddress = $_POST['oaddress'];
    $otel = $_POST['otel'];
    $oemail = $_POST['oemail'];
    $onic = $_POST['onic'];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    updatePham($conn,$id,$pname,$address,$tel,$web,$hor,$oname,$oaddress,$otel,$oemail,$onic);

    echo "hi";
    exit();
}
