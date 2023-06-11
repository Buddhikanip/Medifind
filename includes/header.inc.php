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
    
    <link rel="icon" href="medifind/images/MediFine_Logo_Plain.png">

    
  <link rel="stylesheet" href="medifind/style.css" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- <link href="https://fontawesome.com/icons/shelves?f=classic&s=solid" rel="stylesheet" /> -->
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />

</head>
<body>



<!--Main Navigation-->
<header>

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Brand -->
      <a class="navbar-brand" href="medifind/index.php">
        <img src="medifind/images/MediFine_Logo1.png" height="25" alt="Medifine Logo"
          loading="lazy" />
      </a>
      

      <!-- Right links -->
        <ul class="navbar-nav ms-auto me-5 d-flex flex-row">
            <li class="nav-item">
                <a class="nav-link"><button type="button" class="btn btn-primary btn-sm" id="shsb"> Search </button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" ><button type="button" class="btn btn-primary btn-sm" id="shp"> Show all pharmacies </button></a>
            </li>
        </ul>
      
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<div style="margin-top: 58px;">
