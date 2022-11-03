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

</head>

<div class="container">

<!-- Create auction form -->
<div style="max-width: 800px; margin: 10px auto">
  <h2 class="my-3">Create new auction</h2>
  <div class="card">
    <div class="card-body">
      <!-- Note: This form does not do any dynamic / client-side / 
      JavaScript-based validation of data. It only performs checking after 
      the form has been submitted, and only allows users to try once. You 
      can make this fancier using JavaScript to alert users of invalid data
      before they try to send it, but that kind of functionality should be
      extremely low-priority / only done after all database functions are
      complete. -->
      
      <br>
      <div class="form-group row">
      <label for="picture" class="col-sm-2 col-form-label text-right">Add Picture</label>
      <div class="col-sm-10">
        
        <form action="img_upload.php" method="POST" enctype="multipart/form-data">
            Select image to upload:<br>
          <input type="file" name="file"><br> <br>
          <button type="submit" name="img_submit">UPLOAD</button>
          <small id="pictureHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Upload only .jpg or .jpeg files.</small>
          <?php
          if (isset($_SESSION['img'])) {
            echo '<a target="_blank"><img src="pictures/'.$_SESSION['img'].'" height = 80 width = 80 class="img-fluid img-thumbnail " alt="product"></a>';
          }

          ?>
        </form>
      </div>
      </div>
      
      <br>

      <form method="POST" action="create_auction_result.php">
        <div class="form-group row">
          <label for="item_name" class="col-sm-2 col-form-label text-right">Title of auction</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="auctionTitle" name="item_name" placeholder="e.g. Black mountain bike">
            <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> A short description of the item you're selling, which will display in listings.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label text-right">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="auctionDetails" name="description" rows="4"></textarea>
            <small id="detailsHelp" class="form-text text-muted">Full details of the listing to help bidders decide if it's what they're looking for.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="condition" class="col-sm-2 col-form-label text-right">Condition</label>
          <div class="col-sm-10">
            <select class="form-control" id="auctionCategory" name="condition">
              <option selected>Choose...</option> 
              <option value="brandnew">Brand New</option>
              <option value="likenew">Like New</option>
              <option value="lightused">Lightly Used</option>
              <option value="wellused">Well Used</option>
              <option value="heavilyused">Heavily Used</option>
              </select>
            <small id="conditionHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> State the condition for this item.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="category_ID" class="col-sm-2 col-form-label text-right">Category</label>
          <div class="col-sm-10">
            <select class="form-control" id="auctionCategory" name="category_ID">
              <option selected>Choose...</option>
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
            <small id="categoryHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Select a category for this item.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="starting_price" class="col-sm-2 col-form-label text-right">Starting price</label>
          <div class="col-sm-10">
	        <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" >£</span>
              </div>
              <input type="number" name="starting_price" class="form-control" id="auctionStartPrice">
            </div>
            <small id="startBidHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Initial bid amount.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="reserve_price" class="col-sm-2 col-form-label text-right">Reserve price</label>
          <div class="col-sm-10">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" name="reserve_price">£</span>
              </div>
              <input type="number" class="form-control" name="reserve_price" id="auctionReservePrice">
            </div>
            <small id="reservePriceHelp" class="form-text text-muted">Optional. Auctions that end below this price will not go through. This value is not displayed in the auction listing.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="start_date" class="col-sm-2 col-form-label text-right">Start Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="auctionEndDate" name="start_date">
            <small id="startDateHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Day for the auction to start.</small>
          </div>
        </div>      
        <div class="form-group row">
          <label for="start_time" class="col-sm-2 col-form-label text-right">Start Time</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="auctionEndDate" name="start_time">
            <small id="startTimeHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
          </div>
        </div> 
        <div class="form-group row">
          <label for="end_date" class="col-sm-2 col-form-label text-right">End Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="auctionEndDate" name="end_date">
            <small id="endDateHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Day for the auction to end.</small>
          </div>
        </div>  
        <div class="form-group row">
          <label for="end_time" class="col-sm-2 col-form-label text-right">End Time</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="auctionEndDate" name="end_time">
            <small id="endTimeHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
          </div>
        </div> 
      
        <button type="submit" name="new_auction" class="btn btn-primary form-control">Create Auction</button>
      </form>
    </div>
  </div>
</div>

</div>


<?php include_once("bottom_footer.php")?>