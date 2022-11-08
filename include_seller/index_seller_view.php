
<?php
session_start();
include_once './inc_seller_view.php';
?>

<?php 
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM item JOIN users ON item.user_ID = users.user_id WHERE users.user_type IN ('seller' , 'Both') AND users.email = '$email' ";  # select data from sql table
    $result = mysqli_query($conn, $sql); # send a query to the database
    $resultCheck = mysqli_num_rows($result); # check if you can get the data from the database
    #fetch the data into an array
    echo $resultCheck;
    if ($resultCheck > 0) { 
        while($row = mysqli_fetch_assoc($result)) {
            echo $row ['user_ID'] . "<br>" ;
            echo $row ['item_ID'] . "<br>" ;
            echo $row ['item_name'] . '<br>';
            echo $row ['bidding_status'] . '<br>';


           

        }
        }

    ?>
