<?php
session_start();
include_once 'database_connect/connect_db.php'; //connect to db
$user_id = '';
$item_id = '';
?>

<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>




<?php
if(isset($_POST['watchlist'])){
    $item_id = mysqli_real_escape_string($db_conn, $_POST['item_ID']);
}

$user_id = mysqli_real_escape_string($db_conn, $_SESSION['userid']);




$query = "SELECT item_ID FROM watchlist WHERE item_ID = '$item_id' AND user_ID = '$user_id'";

$result = mysqli_query($db_conn, $query);




if(mysqli_fetch_assoc($result)){
    $message = "Already Exists";
}
else {
    $query = "INSERT INTO watchlist (user_ID, item_ID) VALUES ('$user_id', '$item_id')";
    mysqli_query($db_conn,$query);
}

$fname =  $_SESSION['fname'];



echo "<h1> Welcome $fname. This is your watchlist </h1>";

$query1 = "SELECT item_name, pro_desc, picture FROM item WHERE item_ID IN (SELECT item_ID 
FROM watchlist WHERE user_ID = '$user_id')";
$result1= mysqli_query($db_conn, $query1);

?>
<table style = "width:100%">
<tr>
    <th>Item Name </th>
    <th>Item Description </th>
    <th> Item Picture </th>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result1)) {
     ?>
     <tr>
     <td> <?php echo $row['item_name'] ?> </td>
     <td> <?php echo $row['pro_desc'] ?> </td>
     <td> <img src="pictures/<?php echo $row['picture']; ?>" class="card-img-top" alt="product" style="width:380px;height:280px;"> </td>
    </tr> 
<?php }   
?>
</table>



<?php
if (!isset($_SESSION['userid']))
    header("Location: login.php");



?>

</body>



</html>