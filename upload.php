<?php
session_start();
include_once 'database_connect/connect_db.php';
$id = $_SESSION['userid']; 
/* 
$target_dir = "uploads/";
$fileToUpload = $_FILES['file'];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 */

// Check if image file is a actual image or fake image
if(isset($_POST["img_submit"])) {
  

  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];
  $picid = uniqid('',true);

  $fileExt = explode(',', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  move_uploaded_file($fileTmpName, $fileName);

  if (in_array($fileActualExt, $allowed)){
    if ($fileError === 0) {
        if ($fileSize < 1000000){
          $fileNameNew = "product".$id.$picid.".".$fileActualExt;
          echo $fileNameNew;
          $fileDestination = './uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          //$sql = "UPDATE item SET picture='$fileNameNew' WHERE userid='$id';";
          //$result = mysqli_query($db_conn, $sql);
          
          header("Location: index.php?uploadsuccess");
        } else {
          echo "Your file is too large.";
        }
    } else {
      echo "An error occured.";
    }
  } else {
    echo "Please only upload .jpg/.jpeg/.png files.";
  }

  $allowed = array('jpg', 'jpeg', 'png');

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

/* 
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
} */
?>