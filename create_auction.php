<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$id = $_SESSION['userid'];

include_once 'database_connect/connect_db.php';
include_once("top_header.php");

?>


<?php
/* (Uncomment this block to redirect people without selling privileges away from this page)
  // If user is not logged in or not a seller, they should not be able to
  // use this page.
  if (!isset($_SESSION['account_type']) || $_SESSION['account_type'] != 'seller') {
    header('Location: browse.php');
  }
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

  <h2 class="my-3">Create new auction</h2>
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

      <form method="POST" action="create_auction_result.php" id="auction-form">
        <div class="form-group form-con row">
          <label for="item_name" class="col-sm-2 col-form-label text-right">Title<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="auctionTitle" name="item_name" placeholder="e.g. Black mountain bike. A short description of the item you're sellings.">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error message</small>          
          </div>
        </div>
        <div class="form-group form-con row">
          <label for="description" class="col-sm-2 col-form-label text-right">Details<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <textarea class="form-control" id="auctionDetails" name="description" rows="4" placeholder="Full details of the listing to help bidders decide if it's what they're looking for."></textarea>
            
            <small>Error message</small>
          </div>
        </div>
        <div class="form-group form-con row">
          <label for="condition" class="col-sm-2 col-form-label text-right">Condition<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <select class="form-control" id="auctionCondition" name="condition">
              <option value="none" selected>Choose the condition...</option> 
              <option value="brandnew">Brand New</option>
              <option value="likenew">Like New</option>
              <option value="lightused">Lightly Used</option>
              <option value="wellused">Well Used</option>
              <option value="heavilyused">Heavily Used</option>
              </select>
            <small>Error message</small>
          </div>
        </div>
        <div class="form-group form-con row">
          <label for="category_ID" class="col-sm-2 col-form-label text-right">Category<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <select class="form-control" id="auctionCategory" name="category_ID">
              <option value="none" selected>Select a category...</option>
              <option value="1">Body and Hair</option>
              <option value="2">Sports</option>
              <option value="3">Phones</option>
              <option value="4">Books</option>
              <option value="5">Arts</option>
              <option value="6">Toys</option>
              <option value="7">Cameras</option>
              <option value="8">Jewellery and Watch</option>
              <option value="9">Music Instruments</option>
              <option value="10">Cars</option>
              <option value="11">Laptops</option>
              <option value="12">Furniture</option>
            </select>
            <small>Error message</small>
          </div>
        </div>

        <div class="form-group form-con row">
          <label for="starting_price" class="col-sm-2 col-form-label text-right">Starting price (£) <span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="number" name="starting_price"  id="auctionStartPrice" data-type="currency" placeholder="e.g. £10">
            <small>Error message</small>
          </div>
        </div>

        <div class="form-group form-con row">
          <label for="reserve_price" class="col-sm-2 col-form-label text-right">Reserve price (£) <span class="text-danger">*</span></label>
          <div class="col-sm-10">
              <input type="number" name="reserve_price"  id="auctionReservePrice" data-type="currency" placeholder="e.g. £15">
              <small>Error message</small>
          </div>
        </div>
        
        <div class="form-group form-con row">
          <label for="start_date" class="col-sm-2 col-form-label text-right">Start Date<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="auctionStartDate" name="start_date">
            <small>Error message</small>
          </div>
        </div>      

        <div class="form-group form-con row">
          <label for="start_time" class="col-sm-2 col-form-label text-right">Start Time<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="auctionStartTime" name="start_time">
            <small>Error message</small>
          </div>
        </div> 

        <div class="form-group form-con row">
          <label for="end_date" class="col-sm-2 col-form-label text-right">End Date<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="auctionEndDate" name="end_date">
            <small>Error message</small>
          </div>
        </div>  
        <div class="form-group form-con row">
          <label for="end_time" class="col-sm-2 col-form-label text-right">End Time<span class="text-danger">  *</span></label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="auctionEndTime" name="end_time">
            <small>Error message</small>
          </div>
        </div> 
      
        <button type="submit" name="new_auction" class="btn btn-primary form-control">Create Auction</button>
      </form>
    </div>
  </div>
</div>

</div>


<?php include_once("bottom_footer.php")?>

