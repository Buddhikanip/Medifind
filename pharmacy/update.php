<?php
    $title = 'Update Drug';
    include_once '../includes/header.inc.php';
    include_once '../includes/dbh.inc.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
        if(!isset($_GET["id"])){
            header("location: index.php");
            exit;
        }
    
        $id = $_GET["id"];
        $sql = "SELECT * FROM inventory WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
        if(!$row){
            header("location: update.php?error=stmtfailed");
            exit;
        }
    
        $dname = $row["dname"];
        $manu = $row["manu"];
        $sup = $row["sup"];
        $ndc = $row["ndc"];
        $exp = $row["exp"];
        $qty = $row["qty"];
        $uprice = $row["uprice"];
    }
    if(isset($_SESSION["pname"]))
{
?>

    <div class="container pt-3 ps-4">
        <!-- Breadcrumb -->
        <nav class="d-flex">
        <p class="mb-0">
            <a href="medifind/pharmacy/index.php" class="text-reset"><u>Inventory</u></a>
            <span>/</span>
            <a href="medifind/pharmacy/update.php?id=<?php echo $id?>" class="text-reset">Update drug</a>
        </p>
        </nav>
        <!-- Breadcrumb -->

        <form action="medifind/includes/addnew.inc.php" method="post" class="p-5">
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!-- Gutter g-5 -->
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <select class="form-select form-control form-control-lg" name='dname'>
                        <option selected><?php echo $row['dname']?></option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <!-- manufacture -->
                    <div class="form-outline">
                        <input type="text" name='manu' class="form-control form-control-lg" value="<?php echo $row['manu']?>" required/>
                        <label class="form-label" >Manufacture Name</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- supplier input -->
                    <div class="form-outline">
                        <input type="text" name='sup' class="form-control form-control-lg" value="<?php echo $row['sup']?>" required/>
                        <label class="form-label" >Supplier</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- NDC input -->
                    <div class="form-outline">
                        <input type="text" name='ndc' class="form-control form-control-lg" value="<?php echo $row['ndc']?>" required/>
                        <label class="form-label" >NDC (National Drug Code)</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- date input -->
                    <div class="form-outline">
                        <input type="date" name='exp' class="form-control form-control-lg" value="<?php echo $row['exp']?>" required/>
                        <label class="form-label" >Select Expiration date</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- NDC input -->
                    <div class="form-outline">
                        <input type="text" name='qty' class="form-control form-control-lg" value="<?php echo $row['qty']?>" required/>
                        <label class="form-label" >Quantity on hand</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- date input -->
                    <div class="form-outline">
                        <input type="text" name='uprice' class="form-control form-control-lg" value="<?php echo $row['uprice']?>" required/>
                        <label class="form-label" >Unit price</label>
                    </div>
                </div>
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
                        echo '<div class="alert alert-success">Drug added succesfully !</div>';
                    }
                    else if($_GET["error"] =="dname")
                    {
                        echo '<div class="alert alert-danger">Please select a drug !</div>';
                    }
                }
            ?>

            <!-- Submit button -->
            <button name="update" type="submit" class="btn btn-primary btn-block">Update Drug</button>
        </form>

    </div>
    <script src="js/sweetalert.min.js"></script>
    
<?php
    include_once '../includes/footer.inc.php';
}else{
    header('Location:signin.php');
    exit();
}
?>