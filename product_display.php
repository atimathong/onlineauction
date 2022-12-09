<?php
require 'database_connect/connect_db.php';
include 'utilities/timecalc.php';
include 'bid_status.php';
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script defer src="./watchlist_button.js"></script>
    <script src="https://kit.fontawesome.com/6cc5131127.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Brand Items - Products -->
    <?php
    mysqli_select_db($db_conn, 'pagination');
    $results_per_page = 8;
    $is_search = false;
    // echo $_SESSION['keyword'];
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($db_conn, $_POST['search']);
        $is_search = true;
        $_SESSION['keyword'] = $search;
        if ($search == "") {
            $product_query = "SELECT * FROM item, category WHERE item.category_ID = category.category_ID";
        } else {
            $product_query = "SELECT * FROM item JOIN category ON item.category_ID = category.category_ID WHERE (item_name LIKE '%$search%' OR category.category LIKE '%$search%')";
            //check if search word is contained in the title
        }
    } else {
        // no search 
        $product_query = "SELECT * FROM item, category WHERE item.category_ID = category.category_ID";
        // reset button detected 
        if (isset($_POST['clear-search'])) {
            $_SESSION['keyword'] = "";
            $product_query = "SELECT * FROM item, category WHERE item.category_ID = category.category_ID";
        }
        if (isset($_SESSION['keyword']) && $_SESSION['keyword'] !== "") {
            // keyword is pre-set by search button used keyword in conjunction with filter
            $kw = $_SESSION['keyword'];
            $product_query = "SELECT * FROM item JOIN category ON item.category_ID = category.category_ID WHERE (item_name LIKE '%$kw%' OR category.category LIKE '%$kw%')";

            if (str_contains(get_filter(), 'category')) {
                // ignore search term if user category filter
                $product_query = "SELECT * FROM item, category WHERE item.category_ID = category.category_ID";
            }
        }
    }
    // connect general product query with filter query
    $product_query .=  get_filter();
    // echo $product_query;
    $url = str_replace("/online-auction/", "", $_SERVER['REQUEST_URI']);
    // MySQL query from database connection
    $total_result  = mysqli_query($db_conn, $product_query);
    $number_of_results = mysqli_num_rows($total_result);
    // show number of result for issearch = true
    if ($is_search === true && $number_of_results > 0) {
        echo "<h6>There are " . $number_of_results . " results for " . $search . ".</h6>";
    }
    if ($number_of_results === 0) {
        echo "<h6>Your search doesn't match any of our items.</h6>";
    }
    // total pages available
    $number_of_pages = ceil($number_of_results / $results_per_page);
    // determine which page visitor is currently on: if no page set, use the 1st page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    // determine sql LIMIT starting number
    $this_page_first_result = ((int)$page - 1) * $results_per_page;
    // retrieve selected results from database and display them on page
    $product_query_page = $product_query . " LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($db_conn, $product_query_page);
    ?>
    <div class="display-prod">
        <?php
        // if ($queryResults > 0)
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card mb-3" style="max-width: 1000px;height: 280px;">
                <div class="row g-0">
                    <div class="col-md-5">
                        <a href="product_details.php?id=<?php echo $row['item_ID']; ?>"> <img src="pictures/<?php echo $row['picture']; ?>" class="card-img-top" alt="product" style="width:380px;height:280px;">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body" style="max-height: 280px;">
                            <h4 class="card-title text-uppercase"><?php echo $row['item_name']; ?></h4>
                            <hr>
                            <p class="card-text"><b>Price Start From</b> &pound;<?php echo $row['starting_price']; ?></p>
                            <p class="card-text desc"><?php echo $row['pro_desc']; ?></p>
                            <div class="row" style="position:absolute;bottom:5px;right:5px;left:420px">
                                <div class="sts col-sm-5"><?php if (bidStatus($row) === "Ongoing") { ?><span class="material-symbols-outlined">
                                            stream
                                        </span><b>Bid Status- </b> <?php echo bidStatus($row);
                                                                } ?></div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5" style="display:flex;justify-content: flex-end;">
                                    <a href="product_details.php?id=<?php echo $row['item_ID']; ?>"><button class="btn btn-dark" type="submit" name="detail">See details</button></a>
                                </div>
                            </div>
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
                $suffix_pg = '';
                if (str_contains($url, "filter-apply=")) {
                    $suffix_pg = '&page=';
                } else {
                    $suffix_pg = '?page=';
                }
                if (str_contains($url, $suffix_pg)) {
                    $url = strstr($url, $suffix_pg, true);
                }
                // display the links to the pages
                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="' . $url . $suffix_pg . ($page - 1) . '">Previous</a></li>';
                }
                for ($i = 1; $i <= $number_of_pages; $i++) {
                    echo '<li class="page-item"><a class="page-link" href="' . $url . $suffix_pg . $i . '">' . $i . '</a></li>';
                }
                if ($i > $page + 1) {
                    echo '<li class="page-item"><a class="page-link" href="' . $url . $suffix_pg . ($page + 1) . '">Next</a></li>';
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