<?php
$dbserver = "localhost";
$username = "root";
$password = "root";
$dbname = "online-auction";

$db_conn = mysqli_connect($dbserver,$username,$password,$dbname);

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

