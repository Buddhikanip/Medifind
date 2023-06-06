<?php
    $title = 'profile';
    include_once '../includes/header.inc.php';
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
            header("location: profile.php?error=stmtfailed");
            exit;
        }
    
        $dname = $row["pname"];
        $address = $row["address"];
        $tel = $row["tel"];
        $email = $row["email"];
        $web = $row["web"];
        $hor = $row["hor"];
        $plicense = $row["plicense"];
        $oname = $row["oname"];
        $oaddress = $row["oaddress"];
        $otel= $row["otel"];
        $oemail = $row["oemail"];
        $onic = $row["onic"];
    }

    if(isset($_SESSION["pname"]))
    {
?>


<div class="container pt-3 ps-4">

        <form action="../includes/addnew.inc.php" method="post" class="p-5">
            <h3>Pharmacy Information</h3>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!-- Gutter g-5 -->
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                <div class="form-outline">
                        <input type="text" name='pname' class="form-control form-control-lg" value='<?php echo $row["pname"]?>' required/>
                        <label class="form-label" >Pharmacy's Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- manufacture -->
                    <div class="form-outline">
                        <input type="text" name='address' class="form-control form-control-lg" value='<?php echo $row["address"]?>' required/>
                        <label class="form-label" >Address</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- supplier input -->
                    <div class="form-outline">
                        <input type="text" name='tel' class="form-control form-control-lg" value='<?php echo $row["tel"]?>' required/>
                        <label class="form-label" >Phone Number</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- NDC input -->
                    <div class="form-outline">
                        <input type="email" name='email' class="form-control form-control-lg" value='<?php echo $row["email"]?>' required/>
                        <label class="form-label" >Email</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- date input -->
                    <div class="form-outline">
                        <input type="text" name='web' class="form-control form-control-lg" value='<?php echo $row["web"]?>' required/>
                        <label class="form-label" >Website</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- NDC input -->
                    <div class="form-outline">
                        <input type="text" name='hor' class="form-control form-control-lg" value='<?php echo $row["hor"]?>' required/>
                        <label class="form-label" >Operating hours</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- date input -->
                    <div class="form-outline">
                        <input type="text" name='plicense' class="form-control form-control-lg"value='<?php echo $row["plicense"]?>' required/>
                        <label class="form-label" >Pharmacy License</label>
                    </div>
                </div>
            </div>

            <h3>Owner Information</h3>
            <!-- Gutter g-5 -->
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                <div class="form-outline">
                        <input type="text" name='oname' class="form-control form-control-lg" value='<?php echo $row["oname"]?>' required/>
                        <label class="form-label" >Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- manufacture -->
                    <div class="form-outline">
                        <input type="text" name='oaddress' class="form-control form-control-lg" value='<?php echo $row["oaddress"]?>' required/>
                        <label class="form-label" >Address</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- supplier input -->
                    <div class="form-outline">
                        <input type="text" name='otel' class="form-control form-control-lg" value='<?php echo $row["otel"]?>' required/>
                        <label class="form-label" >Owner phone Number</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- NDC input -->
                    <div class="form-outline">
                        <input type="email" name='oemail' class="form-control form-control-lg" value='<?php echo $row["oemail"]?>' required/>
                        <label class="form-label" >Owner email</label>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-6">
                    <!-- date input -->
                    <div class="form-outline">
                        <input type="text" name='onic' class="form-control form-control-lg" value='<?php echo $row["onic"]?>' required/>
                        <label class="form-label" >Owner NIC</label>
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
            <button name="profile" type="submit" class="btn btn-primary btn-block">Save</button>
        </form>

    </div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    function delete_1(){
        swal({
            title: "Are you sure?",
            text: "Once deleted, this operation can't be reverted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Done! Your file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Delete operation is cancelled!");
            }
        });
    };
    function success_1(){
        swal({
            title: "Signup success!",
            text: "Wait for the admin's confimation!",
            icon: "success",
            button: "Ok!",
        });
    }
    
</script>

<?php
    include_once '../includes/footer.inc.php';
}else{
    header('Location:signin.php');
    exit();
}
?>