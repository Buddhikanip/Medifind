<?php
    $title = 'Medifind';
    include_once 'includes/header.inc.php';
    include_once 'includes/dbh.inc.php';

?>

<div class="container pt-5 ps-4">
        <h3>MEDICINES</h3>

        <div class="input-group text-nowrap" id="search-box" style="display:none;width:40%;margin: auto;">
            <div class="form-outline">
                <input type="search" type="search"class="form-control" />
                <label class="form-label">Search</label>
            </div>
            <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>            
        </div>

        <table class="table table-hover text-center text-nowrap mt-5" id="vd">
            <thead>
                <tr>
                    <th><b>Drug Name</b></th>
                    <th><b>Pharmacy Name</b></th>
                    <th><b>Price</b></th>
                    <th><b>Exp</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM inventory "; //ORDER BY id DESC
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $row['dname'] ?></td>
                                <td><?php echo $row['pname'] ?></td>
                                <td><?php echo $row['uprice'] ?></td>
                                <td><?php echo $row['exp'] ?></td>
                                
                            </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>

        <table class="table table-hover text-center text-nowrap mt-5" id="va" style="display:none;">
            <thead>
                <tr>
                    <th><b>Pharmacy Name</b></th>
                    <th><b>Address</b></th>
                    <th><b>tel</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM phamacy "; //ORDER BY id DESC
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $row['pname'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['tel'] ?></td>
                                
                            </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>

    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#shsb").click(function(){
            $("#search-box").toggle();
        });
    });
    $(document).ready(function(){
        $("#shp").click(function(){
            $("#va").toggle();
            $("#vd").toggle();
        });
    });
</script>

<?php
    include_once 'includes/footer.inc.php';
?>