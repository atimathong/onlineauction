<?php
include 'database_connect/connect_db.php';
// keep the result check function running
include_once 'seller_header.php';
if (!isset($_SESSION)) {
  session_start();
}
$email = $_SESSION['email'];
?>
<?php
$sql = "SELECT * FROM users where email = '$email'";
$result = mysqli_query($db_conn, $sql);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$usertype = $row['user_type'];
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

  <!-- Custom CSS file -->
  <!--  <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
    <link rel="stylesheet" id="roboto-subset.css-css" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5" type="text/css" media="all">
   -->
  <link rel="stylesheet" href="style.css" />

  <script defer src="./change.js"></script>

  <title>Change User Type</title>
</head>





<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">

            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" id="form" action="change_result.php" onsubmit="return checkAll()">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <h1 class="h1 fw-bold mb-0"> Change User Type</h1>
                  </div>

                  <div class="form-con form-outline mb-1">
                    <label class="form-label" for="user_type">User Type</label>
                    <select class="form-control border-dark" id="user_type" name="user_type">
                      <option value="none" selected>Choose the condition...</option>
                      <?php if ($usertype == 'buyer' or $usertype == 'seller') { ?>
                        <option value="both">Both</option>
                      <?php } ?>
                      <?php if ($usertype == 'both') { ?>
                        <option value="None" disabled>None</option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" name="update_user">Save</button>
                  </div>

                  <div class="pt-1 mb-4">
                    <a class="btn btn-dark btn-lg btn-block" href="profile.php">Cancel</a>
                  </div>


                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>