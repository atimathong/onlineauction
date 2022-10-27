<?php
require 'database_connect/product_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     $search = mysqli_real_escape_string($db_conn, $_POST['search']);
     $search_query = "SELECT * FROM item WHERE itemName LIKE '%$search%' OR description LIKE '%$search%'";
    ?>

    <?php if (isset($_POST['status'])) {
        $status = $_POST['status'];
        $search_query .= " AND biddingStatus='$status'";
       
    }
    if(isset($_POST['sort-price'])){
        if($_POST['sort-price'] == "highestprice"){
            $search_query .= " ORDER BY startingPrice DESC";

        }elseif($_POST['sort-price'] == "lowestprice"){
            $search_query .= " ORDER BY startingPrice ASC";
        }
    }
    if(isset($_POST['price-range'])){
        if($_POST['price-range'] == "low"){
            $search_query .= " AND startingPrice<100";

        }elseif($_POST['price-range'] == "med"){
            $search_query .= " AND startingPrice BETWEEN 100 AND 500";
        }elseif($_POST['price-range'] == "high"){
            $search_query .= " AND startingPrice>=500";
        }
    }
    ?>
    
</body>
</html>