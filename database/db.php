<?php
$name = "localhost";
$username = "root";
$password = null;

$conn = new mysqli($name,$username,'','talanta');

if($conn->connect_error){
    die ("connection failed".$conn->connect_error);
}


?>