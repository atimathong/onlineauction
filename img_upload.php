<?php
session_start();
include_once 'database_connect/connect_db.php';
$id = $_SESSION['userid']; 


if(isset($_POST["img_submit"])) {


    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $allowed = array('jpg', 'jpeg', 'png');
    $folder = 'uploads/';
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
        //echo $_SESSION['itemid'];
    }
    }
    
    
    header("Location: create_auction.php?uploadsuccess");
}
?>