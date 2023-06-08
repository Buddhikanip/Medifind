<?php
$title = 'Verify Pharamcy';
include_once '../includes/admin/header.inc.php';
include_once '../includes/dbh.inc.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["id"])){
        header("location: index.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM temp_phamacy WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("Location: signin.php?error=stmtfailed");
        exit();
    }

    $pname= $row["pname"];
    $oname= $row["oname"];
    $email = $row["email"];
    $address = $row["address"];
    $tel = $row["tel"];
    $plicense = $row["plicense"];
    $pwd = $row["pwd"];
    $status = $row["status"];
}
else
{
    header("Location: index.php");
    exit();
}
if(isset($_SESSION["uname"]) == "Admin")
{
?>

<div class="container p-5">
  <h3 class='pb-5'>Edit page - <?php echo $row['pname']?></h3>
                <form class="mx-1 mx-md-4" action="medifind/includes/admin/verify.inc.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-prescription-bottle-medical fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="pname" class="form-control" value="<?php echo $pname; ?>" required />
                        <label class="form-label">Pharmacy Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="oname" class="form-control" value="<?php echo $oname; ?>" />
                        <label class="form-label">Owner Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required />
                        <label class="form-label" for="email">Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-location-dot fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required />
                        <label class="form-label" for="address">Address</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="tel" class="form-control" value="<?php echo $tel; ?>" required />
                        <label class="form-label" for="tel">Phone Number</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-hashtag fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="plicense" class="form-control" value="<?php echo $plicense; ?>" required />
                        <label class="form-label" for="plicense">Pharmacy Licence Number</label>
                      </div>
                    </div>

                    <input type="hidden" name="pwd" value="<?php echo $pwd; ?>">

                    <div class="ps-5">
                      <?php
                      if($status == "1")
                      {
                          echo "<div class=\"form-check\">
                              <input class=\"form-check-input\" type=\"radio\" name=\"status\" value=1 checked/>
                              <label class=\"form-check-label\" for=\"status\"> Verified </label>
                          </div>
                        
                          <div class=\"form-check\">
                              <input class=\"form-check-input\" type=\"radio\" name=\"status\" value=0 />
                              <label class=\"form-check-label\" for=\"status\">  Not Verified </label>
                          </div>";
                      }else {
                          echo "<div class=\"form-check\">
                              <input class=\"form-check-input\" type=\"radio\" name=\"status\" value=1 />
                              <label class=\"form-check-label\" for=\"status\"> Verified </label>
                          </div>
                        
                          <div class=\"form-check\">
                              <input class=\"form-check-input\" type=\"radio\" name=\"status\" value=0 checked/>
                              <label class=\"form-check-label\" for=\"status\">  Not Verified </label>
                          </div>";
                      }
                      ?>
                    </div>

                      <?php
                          if(isset($_GET["error"]))
                          {
                              if($_GET["error"] =="stmtfailed")
                              {
                                  echo '<div class="alert alert-danger">Somethig went wrong !</div>';
                              }
                              else if($_GET["error"] =="none")
                              {
                                  echo '<div class="alert alert-success">Pharmacy verified succesfully !</div>';
                              }
                              else if($_GET["error"] =="againp")
                              {
                                  echo '<div class="alert alert-danger">This pharmacy already verified !</div>';
                              }
                              else if($_GET["error"] =="againe")
                              {
                                  echo '<div class="alert alert-danger">This email already verified !</div>';
                              }
                              else if($_GET["error"] =="not")
                              {
                                  echo '<div class="alert alert-danger">This pharmacy not verified yet !</div>';
                              }
                          }
                      ?>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg">
                        Save
                      </button>
                    </div>
                  </form>
</div>

<?php
include_once '../includes/admin/footer.inc.php';
}
else{
    header('Location:signin.php');
    exit();
}

?>