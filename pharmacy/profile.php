<?php
    $title = 'profile';
    include_once '../includes/header.inc.php';
    include_once '../includes/dbh.inc.php';
    if(isset($_SESSION["pname"]))
    {
?>



<?php
    include_once '../includes/footer.inc.php';
}else{
    header('Location:signin.php');
    exit();
}
?>