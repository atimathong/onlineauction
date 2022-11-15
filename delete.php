<?php 
session_start();
include_once 'database_connect/connect_db.php'; //connect to db
$user_id = '';
$item_id = '';





 
$user_id = mysqli_real_escape_string($db_conn, $_SESSION['userid']);
if(isset($_POST['delete'])){
    $item_id = mysqli_real_escape_string($db_conn, $_POST['item_ID']);
}

$query = "SELECT item_ID FROM watchlist WHERE item_ID = '$item_id' AND buyer_ID = '$user_id'";

$result = mysqli_query($db_conn, $query);


$query = "SELECT item_ID FROM watchlist_delete WHERE item_ID = '$item_id' AND buyer_ID = '$user_id'";

$result = mysqli_query($db_conn, $query);

if(mysqli_fetch_assoc($result)){
    $message = "Already Deleted.";
}
else {
    $query = "INSERT INTO watchlist_delete (buyer_ID, item_ID) VALUES ('$user_id', '$item_id')";
    mysqli_query($db_conn,$query);
}

$query_1 = "SELECT item_ID FROM watchlist_delete WHERE item_ID = '$item_id'";
$result_retain = mysqli_query($db_conn, $query_1);
while($row = mysqli_fetch_assoc($result_retain)){
    $_SESSION['item_id'] = $row['item_ID'];
}
$item_id = $_SESSION['item_id'];

$query_2 = "SELECT item_name FROM item WHERE item_ID = '$item_id'";
$result_item = mysqli_query($db_conn, $query_2);
while($row = mysqli_fetch_assoc($result_item)){
    $item_name = $row['item_name'];
}


mysqli_query($db_conn,"DELETE FROM watchlist WHERE item_ID ='$item_id' AND buyer_ID = '$user_id'");
echo "$item_name has been deleted successfully from your watchlist."
?>
<html>
<form action = 'watchlist.php' method = 'post' target="_self">
          <button style="font-size:24px" type="submit" name="back"> Back to watchlist
          </form> 
<html>
