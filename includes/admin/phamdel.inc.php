<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    include_once '../dbh.inc.php';

    $sql = "DELETE FROM temp_phamacy WHERE id=$id";
    $conn->query($sql);
}

header("location: ../../admin/index.php");
exit();