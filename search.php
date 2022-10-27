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
    <div>
        <?php
        $search = mysqli_real_escape_string($db_conn, $_POST['search']);
        $search_query = "SELECT * FROM item WHERE itemName LIKE '%$search%' OR description LIKE '%$search%'"; //check if search word is contained in the title
        $result = mysqli_query($db_conn, $search_query);
        $queryResults = mysqli_num_rows($result);

        echo "There are " . $queryResults . " results for " . $search . ".";

        if ($queryResults > 0) { ?>
            <div class="page">
                <?php
                // if ($queryResults > 0)
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="card mb-3" style="max-width: 1000px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="product_details.php?id=<?php echo $row['itemID']; ?>"> <img src="pictures/<?php echo $row['picture']; ?>" class="card-img-top" alt="product">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['itemName']; ?></h5>
                                    <p class="card-text">From $<?php echo $row['startingPrice']; ?></p>
                                    <p class="card-text">Bid Status: <?php echo $row['biddingStatus']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } // end of loop 
                ?>
            </div>
        <?php
        } else {
            echo "There are no results matching your search";
        }

        ?>
    </div>
</body>

</html>