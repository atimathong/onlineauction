<?php
session_start();
require 'database_connect/connect_db.php';
include "utilities/email_fn.php";
include "utilities/timecalc.php";
?>

<?php

if (isset($_POST['submit-bid'])) {
    if (!isset($_SESSION['userid'])) {
        header("location: login.php");
    } else {
        $bid_item = $_SESSION["item_detail"];
        $item_id = $bid_item['item_ID'];
        $bid_date = date("Y-m-d");
        $bid_time = date("H:i:s");
        $user_id = $_SESSION['userid'];
        $bid_price = mysqli_real_escape_string($db_conn, $_POST['bid_price']);
        $bid_insert = "INSERT INTO bidding (buyer_ID, item_ID, bidding_date, bidding_time, bid_price)
        VALUES ('$user_id', '$item_id','$bid_date','$bid_time','$bid_price')";

        // add bidding to database
        if (mysqli_query($db_conn, $bid_insert)) {
            // email to users
            $users_query = "SELECT * FROM bidding JOIN users AS u ON bidding.buyer_ID = u.user_ID JOIN (SELECT item_ID, item_name FROM item) as i ON bidding.item_ID = i.item_ID WHERE i.item_ID = '$item_id'";
            $user_item_res = mysqli_query($db_conn, $users_query);
            // print_r(mysqli_num_rows($user_item_res));
            if (mysqli_num_rows($user_item_res) > 0) {
                while ($bid_row = mysqli_fetch_assoc($user_item_res)) {
                    sendEmail($bid_row['email'], $bid_row['firstname'] . " " . $bid_row['lastname'], $bid_row["item_name"], "start_bid", $bid_row["bid_price"], $bid_row['buyer_ID'] === $user_id ? "main_user" : "others", false);
                }
            }
            // redirect user to mybids page
            echo "<script type='text/javascript'>window.onload = function () { alert('Bid created successfully'); window.location.href='mybids.php';}</script>";
            // echo "Bid created successfully";
        } else {
            echo "Error: " . $bid_insert . "<br>" . mysqli_error($db_conn);
        }
    }
}

?>