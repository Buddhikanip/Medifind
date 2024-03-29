<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . '/' ?>" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    
    <link rel="icon" href="Medifind/images/MediFine_Logo_Plain.png">

    
  <link rel="stylesheet" href="Medifind/style.css" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- <link href="https://fontawesome.com/icons/shelves?f=classic&s=solid" rel="stylesheet" /> -->
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

  <!-- <link href="Style\SignupLogin.css" rel="stylesheet" /> -->
</head>
<body>



<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="Medifind/pharmacy/index.php" class="list-group-item list-group-item-action py-2 ripple <?php if($title !=='profile') echo "active" ?> aria-current="true">
          <i class="fas fa-warehouse fa-fw me-3"></i><span>Inventory</span></a>
        <a href="Medifind/pharmacy/profile.php" class="list-group-item list-group-item-action py-2 ripple <?php if($title =='profile') echo "active" ?> ">
          <i class="fas fa-user fa-fw me-3"></i><span>Profile</span></a>
        <a href="Medifind/includes/pharmacy/signout.inc.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-right-from-bracket fa-fw me-3"></i><span>Logout</span></a>        
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href='medifind/pharmacy/index.php' >
        <img src="Medifind/images/MediFine_Logo1.png" height="25" alt="Medifine Logo"
          loading="lazy" />
      </a>
      

      <!-- Right links -->
        <ul class="navbar-nav collapse ms-auto me-5 d-flex flex-row">
            <li class="nav-item">
                <a class="nav-link text-dark"><?php if(isset($_SESSION["pname"])){ echo $_SESSION["pname"];}?></a>
            </li>
        </ul>
      
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
