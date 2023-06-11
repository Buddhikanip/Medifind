<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $iid = $_GET["iid"];
    $cleanStr = $_GET["clean"];

    include_once '../dbh.inc.php';

    $sql = "DELETE FROM $cleanStr WHERE id=$id";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM inventory WHERE id = '$iid'";
    mysqli_query($conn, $sql);
}

header("location: ../../pharmacy/index.php");
exit();