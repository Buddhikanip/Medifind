<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:../../pharmacy/signin.php?error=timeout");
    exit();