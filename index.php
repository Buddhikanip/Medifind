<?php
    include_once 'includes/header.inc.php';
?>

    <div class="container pt-5 ps-4">
        <button class='btn btn-primary float-end me-5'>Add new drug</button>
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
                <tr>
                    <td>Value</td>
                    <td>18,492</td>
                    <td>228</td>
                    <td>350</td>
                    <td>$4,787.64</td>
                    <td>228</td>
                    <td>350</td>
                    <td>$4,787.64</td>
                    <td>
                        <a href="#"><i class="fa-solid fa-trash-can"></i></a> &nbsp; &nbsp; &nbsp;
                        <a href="#"><i class="fa-solid fa-pen"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    
<?php
    include_once 'includes/footer.inc.php';
?>