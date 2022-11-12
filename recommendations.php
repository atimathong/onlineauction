<?php include_once("top_header.php")?>
<?php require("utilities.php")?>
<style>
table, th, td {
  border:1px solid black;
}
</style>

<div class="container">

<h2 class="my-3">Recommendations for you</h2>

<?php
  // This page is for showing a buyer recommended items based on their bid 
  // history. It will be pretty similar to browse.php, except there is no 
  // search bar. This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.
  
  
  // TODO: Check user's credentials (cookie/session).
  $user_id = mysqli_real_escape_string($db_conn, $_SESSION['userid']);
  
  // TODO: Perform a query to pull up auctions they might be interested in.
  $query = "SELECT item_ID, item_name, pro_desc, picture FROM item WHERE category_ID IN (SELECT category_ID FROM item WHERE item_ID IN (SELECT item_ID FROM view_history WHERE (item_ID IN (SELECT item_ID FROM item WHERE view_times = (SELECT MAX(view_times) FROM view_history)) AND user_ID = '$user_id')))";
  $query_result = mysqli_query($db_conn, $query);
  ?>
  <table style = "width:100%">
  <tr>
    <th>Item Name </th>
    <th>Item Description </th>
    <th> Item Picture </th>
    <th> Product Page </th>
  </tr>
  <?php
  while($row = mysqli_fetch_assoc($query_result)){
    ?>
    <tr>
    <td> <?php echo $row['item_name']; ?> </td>
    <td> <?php echo $row['pro_desc'] ?> </td>
    <td> <img src="pictures/<?php echo $row['picture']; ?>" class="card-img-top" alt="product" style="width:380px;height:280px;"> </td>
    <td>  <a href="product_details.php?id=<?php echo $row['item_ID']; ?>"> Link </a> </td>
    </tr>
  <?php
  }
  
  
  // TODO: Loop through results and print them out as list items.
  
?>