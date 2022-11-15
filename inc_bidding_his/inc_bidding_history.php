<?php
$db_Servername = "localhost";
$db_User = "root";
$db_password = "root";
$db_Name = "online-auction"; //depends on the name of the database created

$conn = mysqli_connect($db_Servername, $db_User, $db_password, $db_Name) or
    die('Could not connect: ' .  mysqli_error($conn));

?>