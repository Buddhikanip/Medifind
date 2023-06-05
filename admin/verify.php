<?php
include_once '../includes/admin/header.inc.php';
include_once '../includes/dbh.inc.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["id"])){
        header("location: index.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM phamacy WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("Location: signin.php?error=stmtfailed");
        exit();
    }

    $pname= $_GET["pname"];
    $oname= $_GET["oname"];
    $email = $_GET["email"];
    $address = $_GET["address"];
    $tel = $_GET["tel"];
    $plicense = $_GET["plicense"];
    $pwd = $_GET["pwd"];
    $status = $_GET["status"];
}
else
{
    header("Location: index.php");
    exit();
}
if(isset($_SESSION["userfname"]))
{
?>

<div class="container p-5">
                <form class="mx-1 mx-md-4" method="post">
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
                        <input type="text" name="oname" class="form-control" value="<?php echo $oname; ?>" required />
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

                    <?php
                    if($status == "1")
                    {
                        echo "<div class=\"form-check\">
                            <input class=\"form-check-input\" type=\"radio\" name=\"status\" checked/>
                            <label class=\"form-check-label\" for=\"status\"> Verified </label>
                        </div>
                      
                        <div class=\"form-check\">
                            <input class=\"form-check-input\" type=\"radio\" name=\"status\"/>
                            <label class=\"form-check-label\" for=\"status\">  Not Verified </label>
                        </div>";
                    }else {
                        echo "<div class=\"form-check\">
                            <input class=\"form-check-input\" type=\"radio\" name=\"status\"/>
                            <label class=\"form-check-label\" for=\"status\"> Verified </label>
                        </div>
                      
                        <div class=\"form-check\">
                            <input class=\"form-check-input\" type=\"radio\" name=\"status\" checked/>
                            <label class=\"form-check-label\" for=\"status\">  Not Verified </label>
                        </div>";
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