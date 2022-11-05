
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
            $opt = "'" . implode("','", $_GET['status']) . "'";
            $filter_query .= " AND bidding_status IN ($opt)";
        }
        if (isset($_GET['price-range'])) {
            $opt = "'" . implode("','", $_GET['price-range']) . "'";
            if (in_array("low", $_GET['price-range'])) {
                $filter_query .= " AND starting_price<100";
            }
            if (in_array("med", $_GET['price-range'])) {
                $filter_query .= " AND starting_price BETWEEN 100 AND 500";
            }
            if (in_array("high", $_GET['price-range'])) {
                $filter_query .= " AND starting_price>=500";
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
