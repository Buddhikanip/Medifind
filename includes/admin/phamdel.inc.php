<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    include_once '../dbh.inc.php';
    include_once '../functions.inc.php';

    del($conn,$id);
}

header("location: ../../admin/index.php");
exit();