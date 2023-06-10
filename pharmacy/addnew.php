<?php
    $title = 'Add New Drug';
    include_once '../includes/pharmacy/header.inc.php';

if(isset($_SESSION["pname"]))
{
?>

    <div class="container pt-3 ps-4">
        <!-- Breadcrumb -->
        <nav class="d-flex">
        <p class="mb-0">
            <a href="medifind/pharmacy/index.php" class="text-reset"><u>Inventory</u></a>
            <span>/</span>
            <a href="medifind/pharmacy/addnew.php" class="text-reset">Add new drug</a>
        </p>
        </nav>
        <!-- Breadcrumb -->

        <form action="medifind/includes/pharmacy/addnew.inc.php" method="post" class="p-5">
            <!-- Gutter g-5 -->
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <select class="form-select form-control form-control-lg" name='dname'>
                        <option selected>Select Drug Name</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <!-- manufacture -->
                    <div class="form-outline">
                        <input type="text" name='manu' class="form-control form-control-lg" required/>
                        <label class="form-label" >Manufacture Name</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- supplier input -->
                    <div class="form-outline">
                        <input type="text" name='sup' class="form-control form-control-lg" required/>
                        <label class="form-label" >Supplier</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- NDC input -->
                    <div class="form-outline">
                        <input type="text" name='ndc' class="form-control form-control-lg" required/>
                        <label class="form-label" >NDC (National Drug Code)</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- date input -->
                    <div class="form-outline">
                        <input type="date" name='exp' class="form-control form-control-lg" required/>
                        <label class="form-label" >Select Expiration date</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- NDC input -->
                    <div class="form-outline">
                        <input type="text" name='qty' class="form-control form-control-lg" required/>
                        <label class="form-label" >Quantity on hand</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- date input -->
                    <div class="form-outline">
                        <input type="text" name='uprice' class="form-control form-control-lg" required/>
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
                    else if($_GET["error"] =="qty")
                    {
                        echo '<div class="alert alert-danger">Please enter valid datatype to \'Quantity on hand\' !</div>';
                    }
                }
            ?>

            <!-- Submit button -->
            <button name="submit" type="submit" class="btn btn-primary btn-block">Add Drug</button>
        </form>

    </div>
    
<?php
    include_once '../includes/pharmacy/footer.inc.php';
}else{
    header('Location:signin.php');
    exit();
}
?>