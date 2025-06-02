<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "sinhvien_db";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Kết nối thất bại " . mysqli_connect_errno());
}
else{
    echo"--> Kết nối thành công csdl: " . $database;
}
?>