<?php
include 'database_connect/connect_db.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <!-- Font Logo : Orbitron -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Orbitron:wght@600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <?php if (isset($_SESSION['email']) && $_SESSION['email'] == true) { ?>
    <!-- nav bar -->
    <ul class="nav nav-tabs justify-content-end but">
      <?php if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'buyer') { ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Become a Seller?</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">Hello,<?php echo $_SESSION['fname']; ?>!</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">My Watchlist</a></li>
            <li><a class="dropdown-item" href="mybids.php">My Bidding List</a></li>
            <li><a class="dropdown-item" href="#">My Bidding History</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
          </ul>
        </li>
      <?php } else if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'seller') { ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Become a Buyer?</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">Hello,<?php echo $_SESSION['fname']; ?>!</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="mylistings.php">My Listing</a></li>
            <li><a class="dropdown-item" href="create_auction_1.php">+ Add Product</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
          </ul>
        </li>
      <?php } else { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">Hello,<?php echo $_SESSION['fname']; ?>!</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">My Watchlist</a></li>
            <li><a class="dropdown-item" href="mybids.php">My Bidding List</a></li>
            <li><a class="dropdown-item" href="#">My Bidding History</a></li>
            <li><a class="dropdown-item" href="mylistings.php">My Listing</a></li>
            <li><a class="dropdown-item" href="create_auction_1.php">+ Add Product</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
          </ul>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a class="btn btn-dark" href="logout.php" role="button">Logout</a>
      </li>
    </ul>
  <?php } else { ?>
    <ul class="nav justify-content-end but">
      <li class="nav-item mx-1">
        <a class="btn btn-dark" href="login.php" role="button">Login</a>
      </li>
    </ul>
  <?php } ?>
  <!-- Logo and Search Bar -->
  <nav class="navbar bg-light logoband">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <div class="row">
          <div class="col">
            <h1 class="logo">.eBid</h1>
          </div>
          <div class="col search-bar">
            <form class="d-flex" action="index.php" method="POST">
              <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success search-but" type="submit" name="submit-search">Search</button>
            </form>
          </div>
          <div class="col search-bar">
            <form class="d-flex" action="index.php" method="POST">
              <button class="btn btn-outline-success clear-but" type="submit" name="clear-search">Reset</button>
            </form>
          </div>
        </div>
      </a>
    </div>
  </nav>
  <!-- This is Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>