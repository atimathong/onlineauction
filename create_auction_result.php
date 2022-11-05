<?php 
include_once("top_header.php");
include_once 'database_connect/connect_db.php';
$id = $_SESSION['userid'];
$itemid = $_SESSION['itemid'];
?>



<div class="container my-5">

<?php
$errors = array();

// This function takes the form data and adds the new auction to the database.


/* TODO #2: Extract form data into variables. Because the form was a 'post'
            form, its data can be accessed via $POST['auctionTitle'], 
            $POST['auctionDetails'], etc. Perform checking on the data to
            make sure it can be inserted into the database. If there is an
            issue, give some semi-helpful feedback to user. */
if (isset($_POST['new_auction'])) {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $condition = $_POST['condition'];
    $category_ID = $_POST['category_ID'];
    $starting_price = $_POST['starting_price'];
    $reserve_price = $_POST['reserve_price'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_date = $_POST['end_date'];
    $end_time = $_POST['end_time'];

   
    
    

    
}

/* TODO #3: If everything looks good, make the appropriate call to insert
            data into the database. */
if (count($errors) === 0) {
    $query = "UPDATE item 
    SET 
    item_name= '$item_name', 
    pro_desc= '$description',
    cond= '$condition',
    starting_price='$starting_price',
    reserve_price='$reserve_price',
    sta_date='$start_date',
    start_time='$start_time',
    end_date='$end_date',
    end_time='$end_time',
    category_ID='$category_ID'
    WHERE item_ID='$itemid';";
    
    //echo "<pre>Debug: $query</pre>\m";
    $result = mysqli_query($db_conn, $query);
    
    //echo $result;
    //FOR DEBUGGING
    /* if ( false===$result ) {
        printf("error: %s\n", mysqli_error($db_conn));
        }
        else {
        echo 'done.';
        }
 */
    
    //header('refresh:5;url=index.php');
        }        

// If all is successful, let user know.
//echo('<div class="text-center">Auction successfully created! <a href="index.php">View your new listing.</a></div>');
?>

</div>


<?php include_once("bottom_footer.php")?>