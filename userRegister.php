<?php
print_r($_POST);
$password_hash=password_hash($_POST["password"],PASSWORD_DEFAULT);
$mysqli = require __DIR__."/db_config.php";


// Sign-Up
$sql="INSERT INTO user (user_name,email,password) VALUES(?,?,?)";
$stmt=$mysqli->stmt_init();

if(!$stmt->prepare($sql)){
    die("SQL error".$mysqli->error);
}
$stmt->bind_param("sss",$_POST["user_name"],$_POST["email"],$password_hash);
if($stmt->execute()){
    // echo "signup success";
    header("Location: index.html");
}else{
    die($mysqli->error);
}