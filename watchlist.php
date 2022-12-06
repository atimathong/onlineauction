<?php
include_once "top_header.php";
include "max_bid_price.php";
include_once 'database_connect/connect_db.php'; //connect to db
?>

<!DOCTYPE html>
<html>

<head>
    <title>Font Awesome Icons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    $item_id = mysqli_real_escape_string($db_conn, $_SESSION['itemid']);
    $user_id = mysqli_real_escape_string($db_conn, $_SESSION['userid']);
    if (isset($_POST['functionname']) && $_POST['functionname'] == "add_to_watchlist") {

        $query = "SELECT item_ID FROM watchlist WHERE item_ID = '$item_id' AND buyer_ID = '$user_id'";

        $result = mysqli_query($db_conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $message = "Already Exists";
        } else {
            $query = "INSERT INTO watchlist (buyer_ID, item_ID) VALUES ('$user_id', '$item_id')";
            mysqli_query($db_conn, $query);
        }

        $fname =  $_SESSION['fname'];
    }
    if (isset($_POST['functionname']) && $_POST['functionname'] == "remove_from_watchlist") {
        $remove_wl = "DELETE FROM watchlist WHERE buyer_ID='$user_id' AND item_ID='$item_id'";
        if (mysqli_query($db_conn, $remove_wl)) {
            echo "<script type='text/javascript'>window.onload = function () { alert('Item is removed from watchlist successfully');}</script>";
        } else {
            echo "Error: " . $remove_wl . "<br>" . mysqli_error($db_conn);
        }
    }
    ?>

    <?php
    $query1 = "SELECT u.firstname, u.lastname, i.item_ID, 
i.item_name, i.pro_desc, i.starting_price, picture FROM item i 
INNER JOIN users u ON i.seller_ID = u.user_ID 
WHERE i.item_ID IN (SELECT item_ID FROM watchlist WHERE buyer_ID = '$user_id') ORDER
BY i.item_name";
    $result1 = mysqli_query($db_conn, $query1);

    ?>
    <div class="container">
        <div class="row">
            <h2 class="my-3 col" style="font-family: 'Varela Round', sans-serif;"><b>My Watch List</b></h2>
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width:25%">Item Name</th>
                                <th scope="col" style="width:25%">Item Description</th>
                                <th scope="col" style="width:18%">Seller Name</th>
                                <th scope="col" style="width:23%">Picture</th>
                                <th scope="col" style="width:28%">Current Bid Price(&pound;)</th>
                                <th scope="col" style="width:12%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result1) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result1)) {
                            ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><a href="product_details.php?id=<?php echo $row['item_ID']; ?>"><?php echo $row["item_name"] ?></a></td>
                                        <td><?php echo $row['pro_desc'] ?></td>
                                        <td><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                        <td><img src="pictures/<?php echo $row['picture']; ?>" class="card-img-top" alt="product" style="width:190;height:140px;"></td>
                                        <td><?php echo maxBidQuery($row["item_ID"],$row["starting_price"]) ?></td>
                                        <td>
                                            <form action='delete.php' method='post' target="_self">
                                                <button style="font-size:24px" type="submit" name="delete"> <i style="font-size:24px" class="fa">&#xf014;</i>
                                        </td>
                                        <input type="hidden" name="item_ID" value="<?= $row['item_ID'] ?>">
                                        </form>
                                        </td>

                                    </tr>
                                    <?php $i = $i + 1;
                                    ?> <?php }
                                } else { ?>
                                <tr>
                                    <td colspan="8">No watched item found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<footer style="margin-top:200px;">
<?php
    if (!isset($_SESSION['userid'])) {
        header("Location: login_page.php");
    }

    include_once "bottom_footer.php";

    ?>
</footer>

</html>