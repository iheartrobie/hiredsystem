<?php

$localhost = "localhost:3307";
$root = "root";
$password = "";
$database = "mydb";


$connections = mysqli_connect($localhost, $root, $password, $database);

    if($connections->connect_errno){
        echo "Connection Error".$connections->connect_errno;
    }
    else{
       
    }

?>
