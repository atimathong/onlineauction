<?php
session_start();
require 'database_connect/connect_db.php';
?>


<?php

if (isset($_POST['submit-bid'])) {
    if (!isset($_SESSION['userid'])) {
        header("location: login.php");
    } else {
        $bid_item = $_SESSION["item_detail"];
        $status = $bid_item['bidding_status'];
        $item_id = $bid_item['item_ID'];
        $bid_date = date("Y-m-d");
        $bid_time = date("H:i:s");
        $user_id = $_SESSION['userid'];
        $bid_price = mysqli_real_escape_string($db_conn, $_POST['bid_price']);
        $bid_insert = "INSERT INTO bidding (user_ID, item_ID, bidding_status, bidding_date, bidding_time, bid_price)
        VALUES ('$user_id', '$item_id','$status','$bid_date','$bid_time','$bid_price')";
        // add bidding to database
        if (mysqli_query($db_conn, $bid_insert)) {
            echo "Bid created successfully";
        } else {
            echo "Error: " . $bid_insert . "<br>" . mysqli_error($db_conn);
        }
    }
}

?>