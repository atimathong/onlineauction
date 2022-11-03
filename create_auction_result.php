<?php 
session_start();
include_once("top_header.php");
include_once 'database_connect/connect_db.php';
$id = $_SESSION['userid'];
?>

<div class="container my-5">

<?php
$errors = array();

// This function takes the form data and adds the new auction to the database.

/* TODO #1: Connect to MySQL database (perhaps by requiring a file that
            already does this). */

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

    /* $item_name = mysqli_real_escape_string($db_conn, $_POST['item_name']);
    $description = mysqli_real_escape_string($db_conn, $_POST['description']);
    $condition = mysqli_real_escape_string($db_conn, $_POST['condition']);
    $category_ID = mysqli_real_escape_string($db_conn, $_POST['category_ID']);
    $starting_price = mysqli_real_escape_string($db_conn, $_POST['starting_price']);
    $reserve_price = mysqli_real_escape_string($db_conn, $_POST['reserve_price']);
    $start_date = mysqli_real_escape_string($db_conn, $_POST['start_date']);
    $start_time = mysqli_real_escape_string($db_conn, $_POST['start_time']);
    $end_date = mysqli_real_escape_string($db_conn, $_POST['end_date']);
    $end_time = mysqli_real_escape_string($db_conn, $_POST['end_time']); */

    //form validation

    /* 
    if (empty($item_name)) {
        array_push($errors, "First name is required");
    };
    if (empty($lastname)) {
        array_push($errors, "Last name is required");
    };
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    };
    if ($password_1 != $password_2) {
        array_push($errors, "Passwords do not match");
    }
    if (empty($addressline_1)) {
        array_push($errors, "Address is required");
    };
    if (empty($postal_code)) {
        array_push($errors, "Postal code is required");
    };
    if (empty($phone_number)) {
        array_push($errors, "Phone number is required");
    };
    if (empty($user_type)) {
        array_push($errors, "User type is required");
    }; */

    
    

    
}

/* TODO #3: If everything looks good, make the appropriate call to insert
            data into the database. */
    if (count($errors) === 0) {
        $query = "INSERT INTO item (user_ID, item_name, description, condition, starting_price, reserve_price, start_date, start_time, end_date, end_time, category_ID) 
        VALUES ('$id','$item_name','$description','$condition','$starting_price','$reserve_price','$start_date', '$start_time', '$end_date', '$end_time', '$category_ID'
        )";
        echo "<pre>Debug: $query</pre>\m";
        $result = mysqli_query($db_conn, $query);
        echo $result;
        if ( false===$result ) {
            printf("error: %s\n", mysqli_error($db_conn));
          }
          else {
            echo 'done.';
          }
        echo('<div class="text-center">Auction successfully created! <a href="FIXME">View your new listing.</a></div>');

        //header('refresh:5;url=index.php');
    }        

// If all is successful, let user know.
echo('<div class="text-center">Auction successfully created! <a href="FIXME">View your new listing.</a></div>');


?>

</div>


<?php include_once("bottom_footer.php")?>