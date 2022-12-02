<?php
include 'database_connect/connect_db.php';
if (!isset($_SESSION)) {
  session_start();
}
?>


<!-- HTML CSS not done -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap and FontAwesome CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 
  <link rel="stylesheet" href="style.css" />

  <title>Create Account</title>
</head>

<body>

<div style="height: 100%;background-size: cover;" class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
        
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" id="form" action="register_email_result.php">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <h1 class="h1 fw-bold mb-0"> Register</h1>
                  </div>
                  <div class="d-flex align-items-center mb-3 pb-1">
                  <h3 class="h3 fw-bold mb-0">Your Email Address</h3>
                  </div>


                  <div class="form-con form-outline mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input name="email" type="email" id="email" class="form-control form-control-lg border-bottom border-secondary" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" name="email_val">Create Account</button>
                  </div>

                  <div class="pt-1 mb-4">
                    <a class="btn btn-dark btn-lg btn-block" href="login_page.php">Cancel</a>
                  </div>

                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
