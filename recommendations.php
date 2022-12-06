<?php include_once "database_connect/connect_db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recommendations</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Font Logo : Orbitron -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://kit.fontawesome.com/6cc5131127.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css" />
</head>
<?php
// This page is for showing a buyer recommended items based on their bid 
// history. It will be pretty similar to browse.php, except there is no 
// search bar. This can be started after browse.php is working with a database.

// TODO: Check user's credentials (cookie/session).
$user_id= "";
if (isset($_SESSION['userid'])) {
  $user_id = mysqli_real_escape_string($db_conn, $_SESSION['userid']);
}

// TODO: Perform a query to pull up auctions they might be interested in.
// array collect entire result from each case
$rec_arr = array();
// set ongoing bid status
$ongoing = " AND CONCAT(end_date,end_time) >= CONCAT(CURDATE(), CURTIME())";
// 0.Popular product in general
$query_pop = "SELECT view_history.item_ID,item_name,pro_desc,starting_price,picture, SUM(view_times) as total_view FROM view_history, item WHERE view_history.item_ID = item.item_ID" . $ongoing . "GROUP BY view_history.item_ID ORDER BY total_view DESC LIMIT 0,5";
$query_result_pop = mysqli_query($db_conn, $query_pop);
if (mysqli_num_rows($query_result_pop) > 0) {
  while ($pop =  mysqli_fetch_assoc($query_result_pop)) {
    unset($pop["total_view"]);
    array_push($rec_arr, $pop);
  }
}

// 1.based on view_history
$query = "SELECT item.item_ID,item_name,pro_desc,starting_price,picture FROM item JOIN view_history ON view_history.item_ID = item.item_ID WHERE category_ID IN (SELECT category_ID FROM item WHERE item_ID IN (SELECT item_ID FROM view_history WHERE (item_ID IN (SELECT item_ID FROM view_history WHERE view_times = (SELECT MAX(view_times) FROM view_history WHERE buyer_ID = '$user_id')))))";
$query .= $ongoing;
$query_result = mysqli_query($db_conn, $query);
if (mysqli_num_rows($query_result) > 0) {
  while ($user_view =  mysqli_fetch_assoc($query_result)) {
    array_push($rec_arr, $user_view);
  }
}
// 2.based on collaborative filtering: what other people bid on
$query_collab_bid = "SELECT buyer_ID,bidding.item_ID,item_name,pro_desc,starting_price,picture FROM bidding JOIN item ON bidding.item_ID = item.item_ID WHERE buyer_ID IN (SELECT buyer_ID FROM bidding WHERE item_ID IN (SELECT item_ID FROM bidding WHERE buyer_ID = '$user_id') AND buyer_ID != '$user_id') AND bidding.item_ID NOT IN (SELECT item_ID FROM bidding WHERE item_ID IN (SELECT item_ID FROM bidding WHERE buyer_ID = '$user_id') AND buyer_ID != '$user_id')";
$query_collab_bid .= $ongoing;
$query_res_collab_bid = mysqli_query($db_conn, $query_collab_bid);
if (mysqli_num_rows($query_res_collab_bid) > 0) {
  while ($peer_bid =  mysqli_fetch_assoc($query_res_collab_bid)) {
    // 3.based on collaborative filtering: what other people view
    $buyer_id = $peer_bid['buyer_ID'];
    unset($peer_bid["buyer_ID"]);
    array_push($rec_arr, $peer_bid);
    $query_collab_view = "SELECT view_history.item_ID,item_name,pro_desc,starting_price,picture FROM view_history JOIN item ON view_history.item_ID = item.item_ID WHERE buyer_ID = '$buyer_id'";
    $query_collab_view .= $ongoing;
    $query_res_collab_view = mysqli_query($db_conn, $query_collab_view);
    if (mysqli_num_rows($query_res_collab_view) > 0) {
      while ($peer_view =  mysqli_fetch_assoc($query_res_collab_view)) {
        array_push($rec_arr, $peer_view);
      }
    }
  }
}
// delete duplicated items
$rec_arr_unique = array();
foreach ($rec_arr as $key => $value) {
  if (!in_array($value, $rec_arr_unique)) {
    $rec_arr_unique[$key] = $value;
  }
}
// print_r($rec_arr_unique);
// if still get too little result
if (count($rec_arr_unique) < 4) {
  // if no recommendation at all: get item with most bids
  $query_most_bid = "SELECT item.item_ID,COUNT(item.item_ID) as count_item,item_name,pro_desc,starting_price,picture FROM bidding JOIN item ON bidding.item_ID = item.item_ID GROUP BY item.item_ID ORDER BY count_item DESC LIMIT 0,8";
  $query_res_most_bid = mysqli_query($db_conn, $query_most_bid);
  if (mysqli_num_rows($query_res_most_bid) > 0) {
    while ($bids =  mysqli_fetch_assoc($query_res_most_bid)) {
      array_push($rec_arr_unique, $bids);
    }
  } else {
    // if no recommendation at all: get item with ongoing bids
    $query_general = "SELECT item.item_ID,item_name,pro_desc,starting_price,picture FROM item WHERE CONCAT(end_date,end_time) > CONCAT(CURDATE(), CURTIME()) LIMIT 0,8";
    $query_res_general = mysqli_query($db_conn, $query_general);
    while ($live_bid =  mysqli_fetch_assoc($query_res_general)) {
      array_push($rec_arr_unique, $live_bid);
    }
  }
}
?>

<!-- display result -->

<body class="slider">
  <!-- <div class="container"> -->
  <!-- TODO: Loop through results and print them out as list items. -->
  <div class="container-card swiper" style="max-width:1300px;">
    <div class="slide-container">
      <h2 style="font-family: 'Varela Round', sans-serif;">Recommendations for you</h2>
      <hr>
      <div class="card-wrapper swiper-wrapper">
        <?php
        foreach ($rec_arr_unique as $key => $row) {
        ?>
          <div class="card swiper-slide">
            <div class="card" style="width: 20rem;">
              <a href="product_details.php?id=<?php echo $row['item_ID']; ?>" target="_blank" class="main-link"><img class="card-img-top" style="height:280px;" src="pictures/<?php echo $row['picture']; ?>" alt=<?php echo $row['picture'] ?>></a>
              <div class="card-body" style="height:100px;">
                <h5 class="card-title text-uppercase"><?php echo $row['item_name']; ?></h5>
                <p class="card-text desc"><?php echo $row['pro_desc']; ?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Start from: &pound;<?php echo $row['starting_price']; ?></li>
              </ul>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <br>
    <div class="swiper-pagination"></div>
  </div>

  <!-- <script src="card_slider/swiper-bundle.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="card_slider/script.js"></script>

</body>

</html>