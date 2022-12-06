<?php 
session_start(); 
$id = $_SESSION['userid'];
$_SESSION['itemid']='';
$_SESSION['img']='';
include_once("seller_header.php");
?>


<?php
/* 
  // If user is not logged in or not a seller, they should not be able to
  // use this page.
*/
?>
<head>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Font Logo : Orbitron -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <!-- This is Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script defer src="./create_auction.js"></script>
    <script>
    </script>
</head>

<div class="container">

<!-- Create auction form -->
<div style="max-width: 800px; margin: 10px auto">

  <h2 class="my-3" style="font-family: 'Varela Round', sans-serif;color:#1a2c3e;">Create new auction</h2>
  <h4 class="my-2" style="font-family: 'Varela Round', sans-serif;">Step 1: Upload Product Photo</h4>
  <div class="card">
    <div class="card-body">
    <small id="formHelp" class="form-text text-muted"><span class="text-danger">* Fields are Required.</span>
          
      <br>
      
        
      <form action="img_upload.php" method="POST" id= "img-upload" enctype="multipart/form-data">
        <div class="form-group form-con row">
        <label for="picture" class="col-sm-2 col-form-label text-right">Add Picture<span class="text-danger">  *</span></label>
        <div class="col-sm-10 form-con-btn">
            Select image to upload:<br>
          <input type="file" name="file" id="file" onchange="return fileValidation()"><br>
          <div id="imagePreview"></div><br>
          <button type="submit" name="img_submit" >UPLOAD</button>
          <p id="pictureHelp" class="form-text text-muted"> Upload only .jpg/.jpeg/.png files.</p>
          
          <?php
          if (isset($_FILES['file'])) {
            echo '<script type=text/javascript>alert("success");</script>';
            echo '<a target="_blank"><img src="pictures/'.$_SESSION['img'].'" height = 80 width = 80 class="img-fluid img-thumbnail " alt="product"></a>';
          }
          ?>
          <small>Upload Success!</small>
        </div>
        </div>
      </form>
      <br>

      
    </div>
  </div>
</div>

</div>


<?php include_once("bottom_footer.php")?>

