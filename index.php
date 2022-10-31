<?php
include 'top_header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Font Logo : Orbitron -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <?php
    if (isset($_SESSION['email']) && $_SESSION['email'] == true) { ?>
      echo('<div class="text-center">You are now logged in! You will be redirected shortly.</div>');

      <!-- /Redirect to index after 5 seconds -->
      <!-- header("refresh:5;url=browse.php");   -->
       <!-- Section: filter left, product right -->

       <!-- this should be put in the browse function with full tabs-->
       <div class="container">
        <div class="row">
          <div class="col-3">
            <?php include 'filter.php' ?>
          </div>
          <?php if (isset($_POST['submit-search'])) { ?>
            <div class="col-9">
              <?php include 'search.php' ?>
            </div>
          <?php } else { ?>
            <div class="col-9">
              <img src="pictures/welcome.png" class="img-fluid" alt="welcome">
              <?php include 'product_display.php' ?>
            </div>
          <?php } ?>
        </div>
      </div>
   <?php } else { ?>
      echo('<div class="text-center">You are now logged out! You will be redirected shortly.</div>');

      <!-- Redirect to index after 5 seconds -->
      <!-- this should be put in the browse function without some tabs-->
     
  <?php  } ?>

  <!-- This is Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>

<?php
include 'bottom_footer.php';
?>




