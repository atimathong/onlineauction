<?php
include_once("top_header.php");
require("utilities.php");
include 'cancel_bid.php';
include "utilities/timecalc.php";
include "max_bid_price.php";
// require("timecalc.php");
?>
<!-- 
<div class="container"> -->

<?php
// This page is for showing a user the auctions they've bid on.
// Feel free to extract out useful functions from browse.php and put them in
// the shared "utilities.php" where they can be shared by multiple files.

// TODO: Check user's credentials (cookie/session).
$user_id = $_SESSION['userid'];
// TODO: Perform a query to pull up the auctions they've bidded on.
$bid_query = "SELECT * FROM bidding JOIN item ON bidding.item_ID = item.item_ID WHERE bidding.buyer_ID = '$user_id'";
$bidding_list = mysqli_query($db_conn, $bid_query);
// TODO: Loop through results and print them out as list items.
?>
<div class="container">
  <div class="row">
    <h2 class="my-3 col">My Bidding List</h2>
    <div class="col-md-12">
      <div class="table-wrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col" style="width:25%">Item Name</th>
              <th scope="col" style="width:20%">Picture</th>
              <th scope="col" style="width:10%">Your Bid Price(&pound;)</th>
              <th scope="col" style="width:10%">Current Bid Price(&pound;)</th>
              <th scope="col" style="width:10%">Time Left</th>
              <th scope="col" style="width:10%">Bids</th>
              <th scope="col" style="width:10%">Views</th>
              <th scope="col" style="width:6%">Edit</th>
              <th scope="col" style="width:6%">Cancel</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($bidding_list) > 0) {
              $i = 1;
              while ($bid_row = mysqli_fetch_assoc($bidding_list)) {
                $item_id = $bid_row["item_ID"];
                $end_date = $bid_row['end_date'];
                $end_time = $bid_row['end_time'];
                $end_datetime = strtotime("$end_date" . " " . "$end_time");
                $current = strtotime(date("Y-m-d h:i:sa"));
                $bid_end = new DateTime($end_date  . "T" . $end_time);
                $now =  new DateTime();
                // get DateTime object
                $time_to_end = date_diff($now, $bid_end);
                $int_time_to_end = $end_datetime - $current;
                if ($int_time_to_end >= 0) {
            ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><a href="product_details.php?id=<?php echo $bid_row['item_ID']; ?>"><?php echo $bid_row["item_name"] ?></a></td>
                    <td><img src="pictures/<?php echo $bid_row['picture']; ?>" class="card-img-top" alt="product" style="width:190;height:140px;"></td>
                    <td><?php echo $bid_row["bid_price"] ?></td>
                    <td><?php echo maxBidQuery($bid_row["item_ID"], $bid_row["bid_price"]) ?></td>
                    <td><?php echo display_time_remaining($time_to_end); ?></td>
                    <td><?php echo count_bids($db_conn, $item_id); ?></td>
                    <td><?php echo count_views($db_conn, $item_id)?></td>
                    <td>
                      <form action="product_details.php?id=<?php echo $item_id; ?>" method="POST"><button type="submit" class="btn btn-primary" name="edit-bid" id=<?php echo $bid_row['item_ID']; ?>>Edit</button></form>
                    </td>
                    <td><?php cancelBid($item_id) ?></td>
                  </tr>
                <?php $i = $i + 1;
                } ?> <?php }
                    } else { ?>
              <tr>
                <td colspan="8">No bid found</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->

<?php include_once("bottom_footer.php") ?>