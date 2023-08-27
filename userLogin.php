<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // db connection 
    $mysqli = require __DIR__."/db_config.php";
    $sql=sprintf("SELECT * FROM user
    WHERE user_name = '%s'", $mysqli->real_escape_string($_POST["user_name"]));
    $result=$mysqli->query($sql);
    $user=$result->fetch_assoc();
    // var_dump($user);
    if($user){
        // password check and password_verify for hash to word
        if(password_verify($_POST["password"],$user["password"])){
            header("Location: index.html");
        }
    };
}