<?php
session_start();
require 'database_connect/connect_db.php';
?>


<?php
if (isset($_POST['update-bid'])) {
    $user_id = $_SESSION['userid'];
    $update_price = mysqli_real_escape_string($db_conn, $_POST['new_bid_price']);
    $bid_item = $_SESSION["item_detail"];
    $item_id = $bid_item['item_ID'];
    $bid_update_query = "UPDATE bidding SET bid_price = '$update_price' WHERE user_ID= '$user_id' AND item_ID='$item_id'";
      // edit bidding to database
    if (mysqli_query($db_conn, $bid_update_query)) {
        // redirect user to mybids page
        echo "<script type='text/javascript'>window.onload = function () { alert('Bid updated successfully'); window.location.href='mybids.php';}</script>";
        // echo "Bid created successfully";
    } else {
        echo "Error: " . $bid_update_query . "<br>" . mysqli_error($db_conn);
    }
}
?>