<?php
function uidExists($conn,$plicense,$email)
{
    $sql = "SELECT * FROM phamacy WHERE email = ? OR plicense = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../pharmacy/signin.php?error=stmtfailed");
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
        header("Location:../pharmacy/signin.php?error=wrongUserName");
        exit();
    }
    $pwdHashed = $uidExists["pwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);
    if($checkPwd === false)
    {
        header("Location:../pharmacy/signin.php?error=wrongPassword");
        exit();
    }
    else if($checkPwd === true)
    {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["uid"] = $uidExists["uid"];
        $_SESSION["pname"] = $uidExists["pname"];
        header("Location:../pharmacy/index.php");
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
        header("Location:../pharmacy/signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"sssssss",$pname,$email,$address,$tel,$plicense,$hashedPwd,$status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../pharmacy/index.php?error=none");
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

function addnew($conn,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice)
{
    $sql = "INSERT INTO inventory (dname,manu,sup,ndc,exp,qty,uprice) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../pharmacy/addnew.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sssssss",$dname,$manu,$sup,$ndc,$exp,$qty,$uprice);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../pharmacy/addnew.php?error=none");
    exit();

}

function checkDname($dname)
{
    if($dname == 'Select Drug Name')
    {
        return true;
    }
    return false;
    
}

function update($conn,$id,$dname,$manu,$sup,$ndc,$exp,$qty,$uprice)
{

}

function updatealter($conn,$id)
{
    $sql = "SELECT * FROM temp_phamacy WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();if(!$row){
        header("Location: login.php?error=stmtfailed");
        exit;
    }
    $sql = "UPDATE temp_phamacy SET status = 1 WHERE id = '$id'";
    mysqli_query($conn, $sql);
}

function createPham($conn,$pname,$oname,$email,$address,$tel,$plicense,$pwd,$id)
{
    $sql = "INSERT INTO phamacy (pname,oname,email,address,tel,plicense,pwd) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../admin/verify.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sssssss",$pname,$oname,$email,$address,$tel,$plicense,$pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    updatealter($conn,$id);
    header("Location:../../admin/verify.php?error=none");
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