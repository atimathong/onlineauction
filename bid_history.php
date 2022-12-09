
<?php include 'top_header.php'; ?>
<?php include 'bid_status.php' ?>
<?php include 'max_bid_price.php' ?>
<?php include 'utilities/determine_result.php' ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <title>Bidding history lists</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <h2 class="my-3 col" style="font-family: 'Varela Round', sans-serif;"><b>My Bidding History</b></h2>
      <div class="col-md-12">
        <div class="table-wrap">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th style="width:5%"> Bid ID</th>
                <th style="width:15%"> Product Name</th>
                <th style="width:23%"> Picture</th>
                <th style="width:10%"> Bid Status</th>
                <th style="width:10%"> Your price</th>
                <th style="width:10%"> Current Highest price</th>
                <th style="width:18%"> Bidding Result</th>
                <th style="width:18%"> Bid End Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $mail = $_SESSION['email'];
              $sql = "SELECT * FROM bidding JOIN item ON bidding.item_ID = item.item_ID JOIN users ON users.user_ID = bidding.buyer_ID WHERE users.email = '$mail' AND CONCAT(end_date,end_time)<CONCAT(CURDATE(), CURTIME()) order by bidding.bid_id ASC";  # select data from sql table
              $result = mysqli_query($db_conn, $sql); # send a query to the database
              //$result_maxPrice = mysqli_query($db_conn, $sql_maxPrice);

              $resultCheck = mysqli_num_rows($result); # check if you can get the data from the databas
              //$resultCheck_maxPrice = mysqli_num_rows($result_maxPrice); 

              // #fetch the data into an array
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  if (bidStatus($row) === "Finished") {
                    echo "<tr> <td>" . $row["bid_ID"] . "</td><td>" . $row["item_name"] . "</td><td>" . "<img src='./pictures/" . $row["picture"] . "' width='200' height='200'>"  . "</td><td>" . bidStatus($row) . "</td><td>" .  $row["bid_price"] . "</td><td>" . maxBidQuery($row["item_ID"], $row["starting_price"]) . "</td><td>" . determineResult($row["bid_price"], maxBidQuery($row["item_ID"], $row["starting_price"]), bidStatus($row)) . " </td><td>" .  $row["end_date"] . "</td></tr>";
                  }
                }
              } else {
                echo "No result";
              }
              $db_conn->close()
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
<footer style="margin-top:200px;">
<?php include_once("bottom_footer.php") ?>
</footer>