<?php
    $title = 'Medifind';
    include_once 'includes/header.inc.php';
    include_once 'includes/dbh.inc.php';

?>

<div class="container pt-5 ps-4">
        <h3>MEDICINES</h3>

        <div class="input-group text-nowrap" id="search-box" style="display:none;width:40%;margin: auto;">
            <div class="form-outline">
                <input type="search" type="search" id="form1" class="form-control" />
                <label class="form-label" for="form1">Search</label>
            </div>
            <!-- <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>             -->
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

<script>
    function shsb() {
        var x = document.getElementById("search-box");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function vap() {
        var x = document.getElementById("vd");
        var y = document.getElementById("va");
        if (x.style.display === "none") {
            x.style.display = "flex";
            y.style.display = "none";
        } else {
            y.style.display = "flex";
            x.style.display = "none";
        }
    }
</script>

<?php
    include_once 'includes/footer.inc.php';
?>