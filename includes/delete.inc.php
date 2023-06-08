<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    include_once 'dbh.inc.php';

    $sql = "DELETE FROM inventory WHERE id=$id";
    $conn->query($sql);
}

header("location: ../pharmacy/index.php");
exit();