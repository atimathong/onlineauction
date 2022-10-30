<?php include_once("header.php")?>

<?php
/* (Uncomment this block to redirect people without selling privileges away from this page)
  // If user is not logged in or not a seller, they should not be able to
  // use this page.
  if (!isset($_SESSION['account_type']) || $_SESSION['account_type'] != 'seller') {
    header('Location: browse.php');
  }
*/
?>

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
      <form method="post" action="create_auction_result.php">
        <div class="form-group row">
          <label for="item_name" class="col-sm-2 col-form-label text-right">Title of auction</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="auctionTitle" placeholder="e.g. Black mountain bike">
            <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> A short description of the item you're selling, which will display in listings.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label text-right">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="auctionDetails" rows="4"></textarea>
            <small id="detailsHelp" class="form-text text-muted">Full details of the listing to help bidders decide if it's what they're looking for.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="condition" class="col-sm-2 col-form-label text-right">Condition</label>
          <div class="col-sm-10">
            <select class="form-control" id="auctionCategory">
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
            <select class="form-control" id="auctionCategory">
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
                <span class="input-group-text">£</span>
              </div>
              <input type="number" class="form-control" id="auctionStartPrice">
            </div>
            <small id="startBidHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Initial bid amount.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="reserve_price" class="col-sm-2 col-form-label text-right">Reserve price</label>
          <div class="col-sm-10">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">£</span>
              </div>
              <input type="number" class="form-control" id="auctionReservePrice">
            </div>
            <small id="reservePriceHelp" class="form-text text-muted">Optional. Auctions that end below this price will not go through. This value is not displayed in the auction listing.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="start_date" class="col-sm-2 col-form-label text-right">Start Date</label>
          <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="auctionEndDate">
            <small id="startDateHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Day for the auction to start.</small>
          </div>
        </div>      
        <div class="form-group row">
          <label for="end_date" class="col-sm-2 col-form-label text-right">End Date</label>
          <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="auctionEndDate">
            <small id="endDateHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Day for the auction to end.</small>
          </div>
        </div>  
        <div class="form-group row">
          <label for="picture" class="col-sm-2 col-form-label text-right">Add Picture</label>
          <div class="col-sm-10">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
              <input type="file" name="fileToUpload" id="fileToUpload">
              <input type="submit" value="Upload Image" name="submit">
              <small id="pictureHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Upload only .jpg or .jpeg files.</small>
            </form>
          </div>
        </div>
        <button type="submit" class="btn btn-primary form-control">Create Auction</button>
      </form>
    </div>
  </div>
</div>

</div>


<?php include_once("footer.php")?>