<?php
include 'database_connect/connect_db.php';
// keep the result check function running
include_once 'seller_header.php';
if (!isset($_SESSION)) {
    session_start();
}
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <!-- Font Logo : Orbitron -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6cc5131127.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css" />
</head>
<style>
    table,
    td {
        border: 2px solid white;
        border-collapse: collapse;
    }

    tr:nth-child(even) {
        background-color: #9BB7D4;
    }
</style>

<?php
$sql = "SELECT * FROM users WHERE email = '$email';";
$result = mysqli_query($db_conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['fname'] = $row['firstname'];
        $_SESSION['lname'] = $row['lastname'];
        $_SESSION['account_type'] = $row['user_type'];
        $_SESSION['addressline1'] = $row['addressline_1'];
        $_SESSION['addressline2'] = $row['addressline_2'];
        $_SESSION['postalcode'] = $row['postal_code'];
        $_SESSION['phonenumber'] = $row['phone_number'];
    }
}
if ($_SESSION['account_type'] == 'both') {
    $type = "You're currently both a seller and a buyer.";
} else if ($_SESSION['account_type'] == 'seller') {
    $type = "You're currently a seller.";
} else {
    $type = "You're currently a buyer.";
}
?>

<?php
$sql2 = "SELECT COUNT(buyer_ID) AS amount_of_watching_items FROM users JOIN watchlist ON watchlist.buyer_ID = users.user_ID where email = '$email'";
$result2 = mysqli_query($db_conn, $sql2);
$resultCheck2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
$watching_items = $row2['amount_of_watching_items']
?>

<?php

// A buyer has many bids which is ongong? how to set the condition for the onging bids?
$sql3 = "SELECT count(DISTINCT bidding.item_ID) as amount_of_bids FROM `bidding` join users on bidding.buyer_ID = users.user_ID join item on item.item_ID = bidding.item_ID where email = '$email' AND CONCAT(sta_date,start_time) <= CONCAT(CURDATE(), CURTIME()) AND CONCAT(end_date,end_time) >= CONCAT(CURDATE(), CURTIME())";
$result3 = mysqli_query($db_conn, $sql3);
$resultCheck3 = mysqli_num_rows($result3);
$row3 = mysqli_fetch_assoc($result3);
$bids = $row3['amount_of_bids']
?>

<?php
$seller_id = $_SESSION['userid'];
$sql4 = "SELECT count(item_ID ) AS selling_items FROM `item` WHERE seller_ID = $seller_id";
$result4 = mysqli_query($db_conn, $sql4);
$resultCheck4 = mysqli_num_rows($result4);
$row4 = mysqli_fetch_assoc($result4);
$selling_items = $row4['selling_items']
?>


<div class="page-content page-container" id="page-content">
    <div class="">
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">

            <div class="card p-4">
                <h2 style="font-family: 'Varela Round', sans-serif;">My Profile</h2>
                <div class="mt-3 card justify-content-center">
                    <img src="https://thypix.com/wp-content/uploads/2021/11/sponge-bob-profile-picture-thypix-m.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <table style="width:100%">

                            <div>
                                <p>
                                    <tr>
                                        <td>NAME</td>
                                        <td><?php echo $_SESSION['fname'] . '  ' . $_SESSION['lname']; ?></td>
                                </p>
                                </tr>
                                <tr>
                                    <td>EMAIL</td>
                                    <td>
                                        <p class="text-muted mb-0"><?php echo $_SESSION['email']; ?></p>
                                    </td>
                                </tr>
                            </div>
                            <p class="mt-2 card-text">
                                <tr>
                                    <td>ADDRESS LINE1</td>
                                    <td><?php echo $_SESSION['addressline1']; ?></td>
                                </tr>
                            </p>
                            <p class="card-text">
                                <tr>
                                    <td>ADDRESS LINE2</td>
                                    <td><?php echo $_SESSION['addressline2']; ?></td>
                                </tr>
                            </p>
                            <p class="mt-1 card-text">
                                <tr>
                                    <td>POSTAL CODE</td>
                                    <td><?php echo $_SESSION['postalcode'] . "\r\n"; ?></td>
                                </tr>
                            </p>
                            <p class="mt-1 card-text">
                                <tr>
                                    <td>PHONE NUMBER</td>
                                    <td><?php echo $_SESSION['phonenumber'] . "\r\n"; ?></td>
                                </tr>
                            </p>
                            <p class="mt-1 card-text">
                                <tr>
                                    <td>USER TYPE</td>
                                    <td>
                                        <p><?php echo $type; ?> </p>
                                    </td>
                                </tr>
                            </p>
                            <table>
                                <a class="btn btn-info btn-sm mt-3 mb-4" href="change_type.php">Change User Type</a>

                                <div class="border-top pt-3">
                                    <div class="row">
                                        <?php if ($_SESSION['account_type'] === 'buyer') {

                                        ?>
                                            <div class="col">


                                                <h6>
                                                    <?php echo $bids ?></h6>
                                                <p>Bids</p>
                                            </div>


                                            <div class="col">

                                                <h6><?php echo $watching_items ?></h6>
                                                <p>Watching Items</p>
                                            </div>


                                    </div>
                                <?php } elseif ($_SESSION['account_type'] === 'seller') {
                                ?>
                                    <div>

                                        <div>
                                            <h6>
                                                <?php echo $selling_items ?></h6>
                                            <p>Selling Items</p>
                                        </div>

                                    </div>
                                <?php } else { ?>
                                    <div class="col">


                                        <div style="float:left; width:30%">
                                            <h6>
                                                <?php echo $selling_items ?>
                                            </h6>
                                            <p>Selling Items</p>
                                        </div>


                                        <div style="float:left; width:30%">
                                            <h6>
                                                <?php echo $bids ?></h6>

                                            <p>Bids</p>
                                        </div>

                                        <div style="float:left; width:30%">
                                            <h6><?php echo $watching_items ?></h6>
                                            <p>Watching Items</p>
                                        </div>


                                    </div>


                                <?php } ?>
                                </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>