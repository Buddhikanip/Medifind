<?php
    $title = 'Pharmacy';
    include_once '../includes/header.inc.php';
    include_once '../includes/dbh.inc.php';

if(isset($_SESSION["pname"]))
{
?>

    <div class="container pt-5 ps-4">
        <a class='btn btn-primary float-end me-5' href='Medifind/pharmacy/addnew.php'>Add new drug</a>
        <h3>Inventory</h3>

        <table class="table table-hover text-center text-nowrap mt-5">
            <thead>
                <tr>
                    <th><b>ID</b></th>
                    <th><b>Drug Name</b></th>
                    <th><b>Manufacturer</b></th>
                    <th><b>Supplier</b></th>
                    <th><b>NDC</b></th>
                    <th><b>Expiration date</b></th>
                    <th><b>Quantity</b></th>
                    <th><b>Unit price</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM inventory ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['dname'] ?></td>
                            <td><?php echo $row['manu'] ?></td>
                            <td><?php echo $row['sup'] ?></td>
                            <td><?php echo $row['ndc'] ?></td>
                            <td><?php echo $row['exp'] ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td><?php echo $row['uprice'] ?></td>
                            <td>
                                <a href='<?php echo "medifind/pharmacy/update.php?id=$row[id]"?>'><i class="fa-solid fa-pen"></i></a> &nbsp; &nbsp; &nbsp;
                                <a href='<?php echo "medifind/includes/delete.inc.php?id=$row[id]"?>' onclick="return confirm('Are you sure you want to delete this drug?')"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
    
<?php
    include_once '../includes/footer.inc.php';
}else{
    header('Location:signin.php');
    exit();
}
?>