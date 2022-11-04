<?php
require 'database_connect/connect_db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Font Logo : Orbitron -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Brand Items - Products -->
    <?php
    mysqli_select_db($db_conn, 'pagination');
    $results_per_page = 10;
    $product_query = "SELECT * FROM item";
    $total_result  = mysqli_query($db_conn, $product_query);
    $number_of_results = mysqli_num_rows($total_result);
    // total pages available
    $number_of_pages = ceil($number_of_results / $results_per_page);
    // determine which page visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    // determine sql LIMIT starting number
    $this_page_first_result = ((int)$page - 1) * $results_per_page;
    // retrieve selected results from database and display them on page
    $product_query_page = "SELECT * FROM item LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($db_conn, $product_query_page);
    ?>
    <div class="page">
        <?php
        // if ($queryResults > 0)
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card mb-3" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="product_details.php?id=<?php echo $row['item_ID']; ?>"> <img src="pictures/<?php echo $row['picture']; ?>" class="card-img-top" alt="product">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['item_name']; ?></h5>
                            <p class="card-text">From $<?php echo $row['starting_price']; ?></p>
                            <p class="card-text">Bid Status: <?php echo $row['bidding_status']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
    <div class="text-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                // display the links to the pages
                if($page>1){
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page-1) . '">Previous</a></li>';
                }
                for ($i = 1; $i <= $number_of_pages; $i++) {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                }
                if($i>$page+1){
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page+1) . '">Next</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>

    <!-- This is Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>