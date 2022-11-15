<?php
session_start();
include 'server.php' ?>

<!-- HTML CSS not done -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap and FontAwesome CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom CSS file -->
  <link rel="stylesheet" href="css/custom.css">

  <title>[My Auction Site]
    <!--CHANGEME!-->
  </title>
</head>


<body>
  <div class="container">
    <h2 class="my-3">Register new account</h2>


    <!-- Create auction form -->
    <form method="POST" action="register.php">

      <?php include 'error_msg.php' ?>
      <div class="form-group row">
        <label for="accountType" class="col-sm-2 col-form-label text-right">Registering as a:</label>

        <div class="col-sm-10">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user_type" id="accountBuyer" value="buyer" checked>
            <label class="form-check-label" for="accountBuyer">Buyer</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user_type" id="accountSeller" value="seller">
            <label class="form-check-label" for="accountSeller">Seller</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user_type" id="accountBoth" value="both">
            <label class="form-check-label" for="accountBoth">Both</label>
          </div>
          <small id="accountTypeHelp" class="form-text-inline text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="firstname" class="col-sm-2 col-form-label text-right">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="firstname" placeholder="First Name">
          <small id="firstnameHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="lastname" class="col-sm-2 col-form-label text-right">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="lastname" placeholder="Last Name">
          <small id="lastnameHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="email" placeholder="Email">
          <small id="emailHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label text-right">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password_1" placeholder="Password">
          <small id="passwordHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label text-right">Password Confirm</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password_2" placeholder="Enter password again">
          <small id="password2Help" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="addressline_1" class="col-sm-2 col-form-label text-right">Address Line 1</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="addressline_1" placeholder="Address Line 1">
          <small id="addressline_1Help" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="addressline_2" class="col-sm-2 col-form-label text-right">Address Line 2</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="addressline_2" placeholder="Address Line 2">
          <small id="addressline_2Help" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="postal_code" class="col-sm-2 col-form-label text-right">Postal Code</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="postal_code" placeholder="Postal Code">
          <small id="postalcodeHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>
      <div class="form-group row">
        <label for="phonenumber" class="col-sm-2 col-form-label text-right">Phone Number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
          <small id="phonenumberHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
        </div>
      </div>


      <div class="form-group row">
        <button type="submit" name="reg_user" class="btn btn-primary form-control">Register</button>
      </div>
    </form>

    <div class="text-center">Already have an account? <a href="login.php" data-toggle="modal" data-target="#loginModal">Login</a>

    </div>
</body>

</html>

<!-- hello -->
