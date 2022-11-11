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
<head>
<title>Font Awesome Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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




echo "<h1> Welcome $fname. This is your watchlist. </h1>";

$query1 = "SELECT u.firstname, u.lastname, i.item_ID, 
i.item_name, i.pro_desc, picture FROM item i 
INNER JOIN users u ON i.user_ID = u.user_ID 
WHERE i.item_ID IN (SELECT item_ID FROM watchlist WHERE user_ID = '$user_id') ORDER
BY i.item_name";
$result1= mysqli_query($db_conn, $query1);

?>
<table style = "width:100%">
<tr>
    <th>Item Name </th>
    <th>Item Description </th>
    <th> Seller Name </th>
    <th> Item Picture </th>
    <th> Product Page </th>
    <th> Delete Item </th>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result1)) {
     ?>
     <tr>
     <td> <?php echo $row['item_name'] ?> </td>
     <td> <?php echo $row['pro_desc'] ?> </td>
     <td> <?php 
     echo $row['firstname'].' '.$row['lastname']
     ?> </td>
     <td> <img src="pictures/<?php echo $row['picture']; ?>" class="card-img-top" alt="product" style="width:380px;height:280px;"> </td>
     <td>  <a href="product_details.php?id=<?php echo $row['item_ID']; ?>"> Link </a> </td>
     <td> <form action = 'delete.php' method = 'post' target="_self">
          <button style="font-size:24px" type="submit" name="delete"> <i style="font-size:24px" class="fa">&#xf014;</i> </td>
          <input type = "hidden" name = "item_ID" value = "<?=$row['item_ID']?>">
          </form> 
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
