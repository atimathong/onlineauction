

<?php
session_start();
include_once 'database_connect/connect_db.php';
$id = $_SESSION['userid']; 
$_SESSION['img'] = "";
?>

<head><script defer src="./create_auction.js"></script></head>

<?php

if(isset($_POST["img_submit"])) {


    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $allowed = array('jpg', 'jpeg', 'png');
    $folder = 'pictures/';
    move_uploaded_file($fileTmpName, $folder.$fileName);
    $query = "INSERT INTO item (user_ID, item_name, picture) 
        VALUES ('$id', 'new', '$fileName')";
    $result = mysqli_query($db_conn, $query);
    
    
    
    
    // CONNECT TO CURRECT ROW
    $sql = "SELECT * FROM item WHERE user_ID = '$id' and picture = '$fileName';";
    $sqlResult = mysqli_query($db_conn, $sql);
    $resultCheck = mysqli_num_rows($sqlResult);
    

    if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($sqlResult)) {
        $_SESSION['itemid'] = $row['item_ID'];
        $_SESSION['img']= $row['picture'];
        //echo $_SESSION['img'];
        //echo $_SESSION['itemid'];
    }
    }

    echo "<script>if(!alert('Successfully Uploaded!')){window.location.href='create_auction_2.php';}</script>";
    
    
    
    //header("Location: create_auction.php");
}
?>