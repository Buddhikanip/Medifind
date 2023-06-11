<?php
function uidExists($conn,$plicense,$email)
{
    $sql = "SELECT * FROM phamacy WHERE plicense = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../../pharmacy/signin.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$plicense,$email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($conn,$username,$pwd)
{
    $uidExists = uidExists($conn,$username,$username);
    if($uidExists === false)
    {
        header("Location:../../pharmacy/signin.php?error=wrongUserName");
        exit();
    }
    $pwdHashed = $uidExists["pwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);
    if($checkPwd === false)
    {
        header("Location:../../pharmacy/signin.php?error=wrongPassword");
        exit();
    }
    else if($checkPwd === true)
    {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["cleanStr"] = $uidExists["cleanStr"];
        $_SESSION["pname"] = $uidExists["pname"];
        header("Location:../../pharmacy/index.php");
        exit();
    }
}

function invalidEmail($email)
{
    $result=false;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    return $result;
}

function pwdMatch($pwd,$pwdr)
{
    $result=false;
    if($pwd !== $pwdr){
        $result = true;
    }
    return $result;
}

function createUser($conn,$pname,$email,$address,$tel,$plicense,$pwd,$status)
{
    $sql = "INSERT INTO temp_phamacy (pname,email,address,tel,plicense,pwd,status) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../../pharmacy/signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"sssssss",$pname,$email,$address,$tel,$plicense,$hashedPwd,$status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../../pharmacy/index.php?error=none");
    exit();

}

function loginAdmin($username,$pwd)
{
    if($username !== "admin")
    {
        header("Location:../../admin/signin.php?error=wrongUserName");
        exit();
    }
    if($pwd !== "admin123")
    {
        header("Location:../../admin/signin.php?error=wrongPassword");
        exit();
    }
    else if($pwd === "admin123")
    {
        session_start();
        $_SESSION["uname"] = 'Admin';
        header("Location:../../admin/index.php");
        exit();
    }
}

function addnewInventory($conn,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice,$pname,$last_id,$cleanStr)
{
    $sql = "INSERT INTO inventory (dname,manu,sup,ndc,exp,qty,uprice,pname,rid,cleanStr) VALUES (?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../../pharmacy/addnew.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssssssssss",$dname,$manu,$sup,$ndc,$exp,$qty,$uprice,$pname,$last_id,$cleanStr);
    mysqli_stmt_execute($stmt);
    $lid = mysqli_insert_id($conn);
    $sql = "UPDATE $cleanStr SET iid = '$lid' WHERE id = '$last_id'";
    mysqli_query($conn, $sql);
    mysqli_stmt_close($stmt);
}

function addnew($conn,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice,$pname,$cleanStr)
{
    $sql = "INSERT INTO $cleanStr (dname,manu,sup,ndc,exp,qty,uprice) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../../pharmacy/addnew.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sssssss",$dname,$manu,$sup,$ndc,$exp,$qty,$uprice);
    mysqli_stmt_execute($stmt);
    $last_id = mysqli_insert_id($conn);
    addnewInventory($conn,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice,$pname,$last_id,$cleanStr);
    header("Location:../../pharmacy/addnew.php?error=none");
    exit();

}

function checkDname($dname)
{
    if($dname === 'Select Drug Name')
    {
        return true;
    }
    return false;    
}

function updateInventory($conn,$iid,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice,$pname,$cleanStr)
{
    $sql = "UPDATE inventory SET dname = '$dname', manu = '$manu', sup = '$sup',  ndc = '$ndc', exp = '$exp', qty = '$qty',uprice = '$uprice', pname = '$pname'
            WHERE id = '$iid'";
    mysqli_query($conn, $sql);
}

function update($conn,$id,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice,$pname,$cleanStr,$iid)
{
    $sql = "UPDATE $cleanStr SET dname = '$dname', manu = '$manu', sup = '$sup',  ndc = '$ndc', exp = '$exp', qty = '$qty',uprice = '$uprice'
            WHERE id = '$id'";
    mysqli_query($conn, $sql);
    updateInventory($conn,$iid,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice,$pname,$cleanStr);    
    mysqli_close($conn);
    header('Location:../../pharmacy/index.php');
    exit();
}

function updatealter1($conn,$pname,$oname,$address,$tel,$id,$s)
{
    $sql = "SELECT * FROM temp_phamacy WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();if(!$row){
        header("Location:../../admin/verify.php?id=$id&error=stmtfailed");
        exit;
    }
    $sql = "UPDATE temp_phamacy SET pname = '$pname', oname = '$oname', address = '$address', tel = '$tel', status = '$s' WHERE id = '$id'";
    mysqli_query($conn, $sql);
}

function updatealter0($conn,$id,$s)
{
    $sql = "SELECT * FROM temp_phamacy WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();if(!$row){
        header("Location:../../admin/verify.php?id=$id&error=stmtfailed");
        exit;
    }
    $sql = "UPDATE temp_phamacy SET status = '$s' WHERE id = '$id'";
    mysqli_query($conn, $sql);
}

function createRelevent($conn,$cleanStr)
{
    $sql = "CREATE TABLE $cleanStr (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        dname VARCHAR(200) NOT NULL,
        manu VARCHAR(200) NOT NULL,
        sup VARCHAR(100) NOT NULL,
        ndc VARCHAR(100) NOT NULL,
        exp DATE NOT NULL,
        qty INT(10) NOT NULL,
        uprice VARCHAR(100) NOT NULL,
        iid INT(10) NOT NULL
        )";
    mysqli_query($conn, $sql);
}

function createPham($conn,$pname,$oname,$email,$address,$tel,$plicense,$pwd,$id)
{
    $uidExists1 = uidExists($conn,$plicense,$plicense);
    $uidExists2 = uidExists($conn,$email,$email);    
    $cleanStr = preg_replace('/[^A-Za-z0-9]/', '', $plicense);
    if(!($uidExists1 === false))
    {
        header("Location:../../admin/verify.php?id=$id&error=againp");
        exit();
    }    
    if(!($uidExists2 === false))
    {
        header("Location:../../admin/verify.php?id=$id&error=againe");
        exit();
    }    
    $sql = "INSERT INTO phamacy (pname,oname,email,address,tel,plicense,pwd,cleanStr) VALUES (?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../../admin/verify.php?id=$id&error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssssssss",$pname,$oname,$email,$address,$tel,$plicense,$pwd,$cleanStr);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);    
    createRelevent($conn,$cleanStr);
    updatealter1($conn,$pname,$oname,$address,$tel,$id,1);
    // header("Location:../../admin/verify.php?id=$id&error=none");
    header("Location:../../admin/index.php");
    exit();
}

function checkqty($qty)
{
    if(is_numeric($qty))
    {
        return true;
    }
    return false;
}

function delRelevent($conn,$plicense)
{    
    $cleanStr = preg_replace('/[^A-Za-z0-9]/', '', $plicense);
    $sql = "DROP TABLE $cleanStr";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function delPham($conn,$id,$plicense)
{
    updatealter0($conn,$id,0);    
    $uidExists = uidExists($conn,$plicense,$plicense);
    if($uidExists === false)
    {
        header("Location:../../admin/verify.php?id=$id&error=not");
        exit();
    }
    $id=$uidExists['id'];
    $sql = "DELETE FROM phamacy WHERE id=$id";
    $conn->query($sql);
    delRelevent($conn,$plicense);

    header("Location:../../admin/index.php");
    exit();
}

function del($conn,$id)
{
    $sql = "SELECT * FROM temp_phamacy WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $plicense = $row['plicense'];
    $uidExists = uidExists($conn,$plicense,$plicense);
    if(!($uidExists === false))
    {
        delRelevent($conn,$plicense);
    }

    $sql = "DELETE FROM temp_phamacy WHERE id=$id";
    mysqli_query($conn, $sql);

    header("location: ../../admin/index.php");
    exit();
}

function updatePham($conn,$id,$pname,$address,$tel,$web,$hor,$oname,$oaddress,$otel,$oemail,$onic)
{
    $sql = "SELECT * FROM phamacy WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();if(!$row){
        header("Location: ../pharmacy/profile.php?error=stmtfailed");
        exit;
    }
    $sql = "UPDATE phamacy SET pname = '$pname', address = '$address', tel = '$tel',  web = '$web', hor = '$hor', oname = '$oname',oaddress = '$oaddress' , otel = '$otel' , oemail = '$oemail', onic = '$onic'
            WHERE id = '$id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('Location:../../pharmacy/profile.php?error=none');
    exit();
}