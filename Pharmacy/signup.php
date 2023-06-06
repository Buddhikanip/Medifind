<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pharmacy Sign Up</title>
  <link rel="icon" href="../images/MediFine_Logo_Plain.png">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

  <!-- <link href="Style\SignupLogin.css" rel="stylesheet" /> -->
</head>

<body>
  <section class="vh-110" style="background-color: #eee">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100 p-md-5">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                  <p class="text-center display-3 fw-bold mb-5 mx-2 mx-md-4 mt-4">
                    Sign up
                  </p>
                <div class="col-10 col-sm-10 col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  

                  <form class="mx-1 mx-md-4" action="../includes/signup.inc.php" method="post">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-prescription-bottle-medical fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="pname" class="form-control" required />
                        <label class="form-label">Pharmacy Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="oname" class="form-control" required />
                        <label class="form-label">Owner Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" required />
                        <label class="form-label" for="email">Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-location-dot fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="address" class="form-control" required />
                        <label class="form-label" for="address">Address</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="tel" class="form-control" required />
                        <label class="form-label" for="tel">Phone Number</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-hashtag fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="plicense" class="form-control" required />
                        <label class="form-label" for="plicense">Pharmacy Licence Number</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="pwd" class="form-control" required />
                        <label class="form-label" for="pwd">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="pwdr"  class="form-control" required />
                        <label class="form-label" for="pwdr">Confirm Password</label>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" required />
                      <label class="form-check-label small" for="agree">
                        I agree all statements in
                        <a href="terms.html">Terms of service</a> and <a href="">Privacy Policy</a>
                      </label>
                    </div>

                    <?php
                      if(isset($_GET["error"]))
                      {
                        if($_GET["error"] =="invalidEmail")
                        {
                            echo '<div class="alert alert-danger">Enter a valid Email</div>';
                        }
                        else if($_GET["error"] =="pwdDontMatch")
                        {
                            echo '<div class="alert alert-danger">Password doesn\'t match</div>';
                        }
                        else if($_GET["error"] =="userNameTaken")
                        {
                            echo '<div class="alert alert-danger">This username is already taken</div>';
                        }
                        else if($_GET["error"] =="stmtfailed")
                        {
                            echo '<div class="alert alert-danger">Somethig went wrong !</div>';
                        }
                        else if($_GET["error"] =="none")
                        {
                            echo '<div class="alert alert-success">Account created succesfully !</div>';
                        }
                      }
                    ?>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg">
                        Sign Up
                      </button>
                    </div>
                  </form>
                </div>
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 d-flex align-items-center order-1 order-lg-2"></div>
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 d-flex align-items-center order-1 order-lg-2 mb-5">
                  <img src="../images/MediFineLogo2.png" class="img-fluid img-responsive" alt="Logo" width="400" />
                </div>
              </div>          
              <div class="d-flex justify-content-center small fw-bold ">
                Already have an account? &nbsp; <a href="signin.php" class="link-primary"> Sign in</a>
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