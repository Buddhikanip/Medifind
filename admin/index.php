<?php
include_once '../includes/admin/header.inc.php';
include_once '../includes/dbh.inc.php';
?>

    <div class="container pt-5 ps-4">
        <h3>Pharmacies</h3>

        <table class="table table-hover text-center text-nowrap mt-5">
            <thead>
                <tr>
                    <th><b>ID</b></th>
                    <th><b>Pharmacy Name</b></th>
                    <th><b>Pharmacy Email</b></th>
                    <th><b>Owner Name</b></th>
                    <th><b>Verification Status</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM temp_phamacy ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['pname'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['oname'] ?></td>
                                <td>
                            <?php
                                if ($row['status']== 0)
                                {
                                    echo '<i class="fa-solid fa-xmark fa-xl"></i>';
                                }
                                else{
                                    echo '<i class="fa-solid fa-check fa-xl"></i>';
                                }
                            ?>
                                </td>
                                <td>
                                    <a href="#"><i class="fa-solid fa-trash-can"></i></a> &nbsp; &nbsp; &nbsp;
                                    <a href="#"><i class="fa-solid fa-pen"></i></a>
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
include_once '../includes/admin/footer.inc.php';
?>