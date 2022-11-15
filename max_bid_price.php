<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Price Function</title>
</head>

<body>

    <?php function maxBidQuery($item_id, $start_price)
    { ?>
        <?php
        include 'database_connect/connect_db.php';
        $price_query = "SELECT item_ID, MAX(bid_price) AS 'max_bid_price' FROM bidding WHERE item_ID = '$item_id' GROUP BY item_ID ";
        $max_price_result = mysqli_query($db_conn, $price_query);
        if (mysqli_num_rows($max_price_result) === 0) {
            return $start_price;
        } else {
            $item_max_price = mysqli_fetch_assoc($max_price_result);
            $max_bid_price = $item_max_price['max_bid_price'];
            return $max_bid_price;
        }
        ?>
    <?php } ?>

    <?php function getCurrentBidPrice($item_id, $start_price)
    { ?>
        <script type="text/javascript">
            let result = setInterval(function() {
                // query price every 2 mins
                let maxPrice = <?php echo maxBidQuery($item_id, $start_price) ?>;
                // print(maxPrice);
                document.getElementById("price").innerHTML = maxPrice.toString();
                
            }, 2000)
        </script>
    <?php
        return '<p id="price" style="font-size:16px;"></p>';
    } ?>

</body>

</html>