<?php

include 'database_connect/connect_db.php';
include "utilities/email_fn.php";
include "max_bid_price.php";
if (!isset($_SESSION)) {
    session_start();
}

// this page run every 5 seconds
$item_query = "SELECT item_ID, item_name, sta_date, start_time, end_date, end_time, starting_price, reserve_price FROM item";
$result = mysqli_query($db_conn, $item_query);
$result_count = mysqli_num_rows($result);
//  current date/time
$today_datetime = strtotime(date("Y-m-d h:i:sa"));
if ($result_count > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $start_date = $row['sta_date'];
        $start_time = $row['start_time'];
        $start_datetime = strtotime("$start_date" . " " . "$start_time");

        $end_date = $row['end_date'];
        $end_time = $row['end_time'];
        $end_datetime = strtotime("$end_date" . " " . "$end_time");

        // echo $row['item_name'];

        // echo ($today_datetime  -  $end_datetime);

        if (-5 < $today_datetime  -  $end_datetime && $today_datetime  -  $end_datetime < 5) {

            $item_id = $row['item_ID'];

            $item_nm = $row['item_name'];
            $item_sta_price = $row['starting_price'];
    
            $winning_price = maxBidQuery($item_id, $item_sta_price);
    
            $item_user_query = "SELECT item_ID, buyer_ID, firstname, lastname, email, bid_price FROM bidding JOIN users ON bidding.buyer_ID = users.user_ID WHERE item_ID = '$item_id'";

            $user_result = mysqli_query($db_conn, $item_user_query);
            $count_usr = mysqli_num_rows($user_result);
            if ($count_usr > 0) {
                if ($winning_price < $row['reserve_price']) {

                    while ($users = mysqli_fetch_assoc($user_result)) {
                        // bidding fails
                        sendEmail($users['email'], $users['firstname'] . " " . $users['lastname'], $item_nm, "end_bid", $users['bid_price'], "main_user", true);
                    }
                } else {
                    // bidding result obtained
                    while ($users = mysqli_fetch_assoc($user_result)) {
                        if ($users['bid_price'] === $winning_price) {
                            //winner
                            sendEmail($users['email'], $users['firstname'] . " " . $users['lastname'], $item_nm, "end_bid", $users['bid_price'], "main_user", false);
                        } else {
                            //losers
                            sendEmail($users['email'], $users['firstname'] . " " . $users['lastname'], $item_nm, "end_bid", $users['bid_price'], "others", false);
                        }
                    }
                }
            }
        }
    }
}

?>



