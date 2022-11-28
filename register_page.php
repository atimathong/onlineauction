<?php
session_start();
// include_once("top_header.php");

include 'server.php'; ?>

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
  <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
  <link rel="stylesheet" id="roboto-subset.css-css" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5" type="text/css" media="all">
  
  <link rel="stylesheet" href="style.css" />
  <title>Register</title>
  <script defer src="./register.js"></script>
</head>

<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://images.unsplash.com/photo-1574634534894-89d7576c8259?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="server.php" id="form" onsubmit="return checkAll()">
                  
                  <?php include 'error_msg.php' ?>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <!--icon <i class="fa fa-bold fa-2x me-3" style="color: #ff6219;"></i> -->
                    <h1 class="h1 fw-bold mb-0">  .eBid Register</h1>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create your account</h5>

                  <div class="form-con form-outline mb-1">
                    <label class="form-label" for="user_type">User Type</label>
                        <select class="form-control" id="user_type" name="user_type">
                        <option value="none" selected>Choose the condition...</option> 
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="both">Both</option>
                        </select>
                        <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input name="firstname" type="text" id="firstname" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="firstname">First Name</label>
                    <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input name="lastname" type="text" id="lastname" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="lastname">Last Name</label>
                    <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input name="email" type="email" id="email" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="email">Email</label>
                    <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input name="password_1" type="password" id="password" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="password_1">Password</label>
                    <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input type="password" id="password_2" name="password_2" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="password_2">Password Check</label>
                    <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input name="addressline_1" type="text" id="addressline_1" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="addressline_1">Address Line 1</label>
                    <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input name="addressline_2" type="text" id="addressline_2" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="addressline_2">Address Line 2</label>
                    <small>Error message</small>
                  </div>
                  
                  <div class="form-con form-outline mb-1">
                    <input name="postal_code" type="text" id="postal_code" class="form-control form-control-lg border border-light" />
                    <label class="form-label" for="postal_code">Postal Code</label>
                    <small>Error message</small>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <input name="phone_number" id="phone_number" type="text" class="form-control form-control-lg border border-light" name="phone_number">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <small>Error message</small>
                  </div>


                  <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" name="reg_user" type="button">Register</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="login_page.php"
                      style="color: #393f81;">Login here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>