<?php
require 'database_connect/product_db.php';
?>

    <?php
    $search = mysqli_real_escape_string($db_conn, $_POST['search']);
    $search_query = "SELECT * FROM item WHERE itemName LIKE '%$search%' OR description LIKE '%$search%'";
    ?>
    <?php if (isset($_POST['category'])) {
        $opt = "'" . implode("','", $_POST['category']) . "'";
        $search_query .= " AND category IN ($opt)";
    }
    if (isset($_POST['sort-price'])) {
        if ($_POST['sort-price'] == "highestprice") {
            $search_query .= " ORDER BY startingPrice DESC";
        } elseif ($_POST['sort-price'] == "lowestprice") {
            $search_query .= " ORDER BY startingPrice ASC";
        }
    }
    ?>    
    <?php if (isset($_POST['status'])) {
        $opt = "'" . implode("','", $_POST['status']) . "'";
        $search_query .= " AND biddingStatus IN ($opt)";
    }
    if (isset($_POST['price-range'])) {
        $opt = "'" . implode("','", $_POST['price-range']) . "'";
        if (in_array("low", $_POST['price-range'])) {
            $search_query .= " AND startingPrice<100";
        }
        if (in_array("med", $_POST['price-range'])) {
            $search_query .= " AND startingPrice BETWEEN 100 AND 500";
        }
        if (in_array("high", $_POST['price-range'])) {
            $search_query .= " AND startingPrice>=500";
        }
    }
    ?>

