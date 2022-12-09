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

        if (-1.5 < $today_datetime  -  $end_datetime && $today_datetime  -  $end_datetime < 1.5) {
            $item_id = $row['item_ID'];

            $item_nm = $row['item_name'];
            $item_sta_price = $row['starting_price'];
            // use for telling who is the winner
            $winning_price = maxBidQuery($item_id, $item_sta_price);
            // get all the user who bidded on ending items
            $item_user_query = "SELECT item_ID, buyer_ID, firstname, lastname, email, bid_price FROM bidding JOIN users ON bidding.buyer_ID = users.user_ID WHERE item_ID = '$item_id'";
            $user_result = mysqli_query($db_conn, $item_user_query);
            // get seller name and email
            $seller_query = "SELECT seller_ID, firstname, lastname, email FROM item JOIN users ON item.seller_ID = users.user_ID WHERE item_ID = '$item_id'";
            $seller_result = mysqli_query($db_conn, $seller_query);
            $count_usr = mysqli_num_rows($user_result);
            if ($count_usr > 0) {
                if ($winning_price < $row['reserve_price']) {

                    while ($users = mysqli_fetch_assoc($user_result)) {
                        // bidding fails
                        // echo "failed  email";
                        sendEmail($users['email'], $users['firstname'] . " " . $users['lastname'], $item_nm, "end_bid", $users['bid_price'], "main_user", true);
                    }
                    while ($seller = mysqli_fetch_assoc($seller_result)) {
                        // seller receive 1 email that the bid is unsuccessful
                        sendEmail($seller['email'], $seller['firstname'] . " " . $seller['lastname'], $item_nm, "end_bid", 0, "seller", true);
                    }
                } else {
                    // bidding result obtained
                    while ($users = mysqli_fetch_assoc($user_result)) {
                        if ($users['bid_price'] === $winning_price) {
                            //winner
                            // echo "winner email";
                            sendEmail($users['email'], $users['firstname'] . " " . $users['lastname'], $item_nm, "end_bid", $users['bid_price'], "main_user", false);
                            while ($seller = mysqli_fetch_assoc($seller_result)) {
                                // seller receive 1 email that the bid is successful
                                sendEmail($seller['email'], $seller['firstname'] . " " . $seller['lastname'], $item_nm, "end_bid", $users['bid_price'], "seller", false, $users['firstname'] . " " . $users['lastname']);
                            }
                        } else {
                            //losers
                            // echo "loser email";
                            sendEmail($users['email'], $users['firstname'] . " " . $users['lastname'], $item_nm, "end_bid", $users['bid_price'], "others", false);
                        }
                    }
                }
            }
        }
    }
}
