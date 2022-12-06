
<?php
// check if there is any filter condition and output extra query to connect with main query
function get_filter()
{
    $filter_query = "";
    // if (isset($_GET['filter-apply'])) {
    if (isset($_GET['category'])) {
        $opt = "'" . implode("','", $_GET['category']) . "'";
        $filter_query .= " AND category IN ($opt)";
    }
    if (isset($_GET['status'])) {
        if (in_array("Ongoing", $_GET['status'])) {
            $filter_query .= " AND CONCAT(sta_date,start_time) <= CONCAT(CURDATE(), CURTIME()) AND CONCAT(end_date,end_time) >= CONCAT(CURDATE(), CURTIME())";
        } else if (in_array("Upcoming", $_GET['status'])) {
            $filter_query .= " AND sta_date > CURDATE()";
        } else if (in_array("Finished", $_GET['status'])) {
            $filter_query .= " AND end_date < CURDATE()";
        }
    }
    if (isset($_GET['price-range'])) {
        if (in_array("low", $_GET['price-range'])) {
            $filter_query .= " AND starting_price<500";
        }
        if (in_array("med1", $_GET['price-range'])) {
            $filter_query .= " AND starting_price BETWEEN 500 AND 1500";
        }
        if (in_array("med2", $_GET['price-range'])) {
            $filter_query .= " AND starting_price BETWEEN 1500 AND 4500";
        }
        if (in_array("high1", $_GET['price-range'])) {
            $filter_query .= " AND starting_price BETWEEN 4500 AND 10000";
        }
        if (in_array("high2", $_GET['price-range'])) {
            $filter_query .= " AND starting_price>=10000";
        }
    }
    if (isset($_GET['use-cond'])) {
        if (in_array("brand-new",$_GET['use-cond'])) {
            $filter_query .= " AND cond = 'Brand new'";
        } elseif (in_array("well-used",$_GET['use-cond'])) {
            $filter_query .= " AND cond = 'Well Used'";
        } elseif (in_array("lightly-used",$_GET['use-cond'])) {
            $filter_query .= " AND cond = 'Lightly used'";
        } elseif (in_array("heavily-used",$_GET['use-cond'])) {
            $filter_query .= " AND cond = 'Heavily Used'";
        } elseif (in_array("like-new",$_GET['use-cond'])) {
            $filter_query .= " AND cond = 'Like new'";
        } 
    }
    if (isset($_GET['sort-price'])) {
        if ($_GET['sort-price'] == "highestprice") {
            $filter_query .= " ORDER BY starting_price DESC";
        } elseif ($_GET['sort-price'] == "lowestprice") {
            $filter_query .= " ORDER BY starting_price ASC";
        }
    }
    // }
    return $filter_query;
}
?>
