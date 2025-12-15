<?php
$servername = "mysql-db";
$username = "root";     
$password = "123";         
$dbname = "shop_db";    

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>