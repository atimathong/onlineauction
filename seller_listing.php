<?php include 'top_header.php'; ?>
<?php include 'bid_status.php'; ?>
<?php include 'delete_item.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <title>Seller viewing lists</title>

</head>

<body>
  <div class="container">
    <div class="row">
      <h2 class="my-3 col">My Selling Lists</h2>
      <div class="col-md-12">
        <div class="table-wrap">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col" style="width:12%"> Product Name</th>
                <th scope="col" style="width:6%"> Product Category</th>
                <th scope="col" style="width:5%"> Product ID</th>
                <th scope="col" style="width:18%"> Picture</th>
                <th scope="col" style="width:7%"> Start Price(&pound;)</th>
                <th scope="col" style="width:7%"> Reserved Price(&pound;)</th>
                <th scope="col" style="width:9%"> Bid start date</th>
                <th scope="col" style="width:9%"> Bid end date</th>
                <th scope="col" style="width:7%"> Status</th>
                <th scope="col" style="width:8%"> View rates</th>
                <th scope="col" style="width:7%"> Delete </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $user_id = $_SESSION['userid'];
              $sql = "SELECT * FROM item JOIN category ON item.category_ID = category.category_ID JOIN users ON item.seller_ID = users.user_ID WHERE users.user_type IN ('seller' , 'both') AND users.user_ID = '$user_id'";  # select data from sql table

              $result = mysqli_query($db_conn, $sql);

              $resultCheck = mysqli_num_rows($result); # check if you can get the data from the database
              // echo $resultCheck . 'items';
              #fetch the data into an array
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $id = $row['item_ID'];
                  $sql2 = "SELECT item_ID, SUM(view_times) AS view_rate FROM view_history WHERE item_ID = '$id' GROUP BY item_ID";
                  $result2 = mysqli_query($db_conn, $sql2);
                  $resultCheck2 = mysqli_num_rows($result2);
                  $view_rate = 0;
                  if ($resultCheck2 > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                      $view_rate = $row2['view_rate'];
                    }
                  } ?>
                  <tr>
                    <td><?php echo $row["item_name"] ?></td>
                    <td> <?php echo $row["category"] ?></td>
                    <td> <?php echo $row["item_ID"] ?></td>
                    <td><img src='./pictures/<?php echo $row["picture"]?>' width='200' height='200'></td>
                    <td><?php echo $row["starting_price"] ?></td>
                    <td><?php echo $row["reserve_price"] ?></td>
                    <td><?php echo $row["sta_date"] ?></td>
                    <td><?php echo $row["end_date"] ?></td>
                    <td><?php echo bidStatus($row) ?></td>
                    <td><?php echo $view_rate ?></td>
                    <td><?php deleteItem($row["item_ID"]) ?></td>
                  </tr>
              <?php }
              } else {
                echo "No result";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> -->
</body>
</div>

</html>

<?php include_once("bottom_footer.php") ?>