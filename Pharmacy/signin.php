<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MediFine-Sign In</title>
  <link rel="icon" href="../images/MediFine_Logo_Plain.png">

  <!-- <link rel="stylesheet" href="signin.css" /> -->
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

  <!-- <link href="Style\SignupLogin.css" rel="stylesheet" /> -->
</head>

<body>
  <section class="vh-110" style="background-color: #eee ">
    <div class="container h-100"><!-- p-md-5 py-5 -->
      <div class="row d-flex justify-content-center align-items-center h-100 p-md-5">
        <div class="col-lg-12 col-xl-11 mb-2">
          <div class="card mx-auto text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <h1 class="text-center display-3 fw-bold mb-5 mt-4">
                  Sign In
                </h1>
                <div
                  class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-4 d-flex align-items-center order-1 order-lg-1 mb-5">
                  <img src="../images/MediFineLogo2.png" class="img-fluid img-responsive" alt="Logo" width="400" />
                </div>
                <!-- <div class="col-lg-1 col-xl-2"></div> -->
                <div class="col-10 col-sm-10 col-md-10 col-lg-6 col-xl-5 order-2 order-lg-2 mt-5">
                  <form action="../includes/signin.inc.php" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="uid" class="form-control form-control-lg" required />
                      <label class="form-label">Email / Pharmacy Licence Number</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                      <input type="password" name="pwd" class="form-control form-control-lg" autocomplete="new-password" required />
                      <label class="form-label" >Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                      <!-- Checkbox -->
                      <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" />
                        <label class="form-check-label"\>
                          Remember me
                        </label>
                      </div>
                      <a href="#!" class="text-body">Forgot password?</a>
                    </div>

                    <?php
                      if(isset($_GET["error"]))
                      {
                        if($_GET["error"] =="wrongUserName")
                        {
                            echo '<div class="alert alert-danger">Enter a valid Username</div>';
                        }
                        else if($_GET["error"] =="wrongPassword")
                        {
                            echo '<div class="alert alert-danger">Enter valid password</div>';
                        }
                        else if($_GET["error"] =="none")
                        {
                            echo '<div class="alert alert-success">Account created successfully Please signin now !</div>';
                        }
                      }
                    ?>

                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="submit" name="pharmacy" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem">
                        Login
                      </button>
                      <p class="small fw-bold mt-2 pt-1 mb-0">
                        Don't have an account?
                        <a href="signup.php" class="link-danger">Register</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

</body>

</html>