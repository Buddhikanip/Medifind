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

createUser($conn,$pname,$email,$address,$tel,$plicense,$pwd,$status)
{
    $sql = "INSERT INTO temp_phamacy (pname,email,address,tel,plicense,pwd,status) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../pharmacy/signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"sssssss",$pname,$email,$address,$tel,$plicense,$pwd,$status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../pharmacy/signin.php?error=none");
    exit();
}