<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:../../admin/signin.php?error=timeout");
    exit();