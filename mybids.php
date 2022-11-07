<?php
include_once("top_header.php");
require("utilities.php");
require 'cancel_bid.php'
// require("countdown.php");
?>

<div class="container">

  <h2 class="my-3">My Bidding List</h2>

  <?php
  // This page is for showing a user the auctions they've bid on.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.

  // TODO: Check user's credentials (cookie/session).
  $user_id = $_SESSION['userid'];
  // TODO: Perform a query to pull up the auctions they've bidded on.
  $bid_query = "SELECT * FROM bidding JOIN item ON bidding.item_ID = item.item_ID WHERE bidding.user_ID = '$user_id' AND bidding.bidding_status = 'on-going'";
  $bidding_list = mysqli_query($db_conn, $bid_query);
  // TODO: Loop through results and print them out as list items.
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="table-wrap">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="width:25%">Item Name</th>
                <th scope="col" style="width:20%">Picture</th>
                <th scope="col" style="width:12%">Your Bid Price(&pound;)</th>
                <th scope="col" style="width:10%">Time Left</th>
                <th scope="col" style="width:10%">Bids</th>
                <th scope="col" style="width:10%">Watchers</th>
                <th scope="col" style="width:6%">Edit</th>
                <th scope="col" style="width:6%">Cancel</th>
              </tr>
            </thead>
            <tbody>
              <?php if (mysqli_num_rows($bidding_list) > 0) {
                $i = 1;
                while ($bid_row = mysqli_fetch_assoc($bidding_list)) {
                  $bid_end = new DateTime($bid_row['end_date'] . "T" . $bid_row['end_time']);
                  $now =  new DateTime();
                  $time_to_end = date_diff($now, $bid_end);
              ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?php echo $bid_row["item_name"] ?></td>
                    <td><img src="pictures/<?php echo $bid_row['picture']; ?>" class="card-img-top" alt="product" style="width:190;height:140px;"></td>
                    <td><?php echo $bid_row["bid_price"] ?></td>
                    <td><?php echo display_time_remaining($time_to_end); ?></td>
                    <td><?php
                        $item_id = $bid_row["item_ID"];
                        $bid_count_query = "SELECT item_ID,COUNT(item_ID) AS count_bid FROM bidding WHERE item_ID = '$item_id' GROUP BY item_ID";
                        $bid_count = mysqli_query($db_conn, $bid_count_query);
                        $bid = mysqli_fetch_assoc($bid_count);
                        echo $bid['count_bid']; ?></td>
                    <td><?php
                        $watch_query = "SELECT item_ID,COUNT(item_ID) AS count_watch FROM watchlist WHERE item_ID = '$item_id' GROUP BY item_ID";
                        $watch_count = mysqli_query($db_conn, $watch_query);
                        if (mysqli_num_rows($watch_count) > 0) {
                          $watch = mysqli_fetch_assoc($watch_count);
                          echo $watch['count_watch'];
                        } else {
                          echo "0";
                        }
                        ?></td>
                    <td>
                      <form action="product_details.php?id=<?php echo $item_id; ?>" method="POST"><button type="submit" class="btn btn-primary" name="edit-bid" id=<?php echo $bid_row['item_ID']; ?>>Edit</button></form>
                    </td>
                    <td><?php cancelBid($item_id) ?></td>
                  </tr>
                <?php $i = $i + 1;
                } ?> <?php } else { ?>
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
</div>

<?php include_once("bottom_footer.php") ?>