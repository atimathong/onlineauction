<?php
  // FIXME: At the moment, I've allowed these values to be set manually.
  // But eventually, with a database, these should be set automatically
  // ONLY after the user's login credentials have been verified via a 
  // database query.
  session_start();
  include_once 'database_connect/connect_db.php';
?>

<!--  the nav bar down here will be integrated to top_header file. -->


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

  <title>[My Auction Site] <!--CHANGEME!--></title>
</head>


<body>

<!-- Navbars -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mx-2">
  <a class="navbar-brand" href="#">Site Name <!--CHANGEME!--></a>
  <ul class="navbar-nav ml-auto">

    <li class="nav-item"></li>
  

<?php
  // Displays either login or logout on the right, depending on user's
  // current status (session).
  // TODO: select statement to query user details
  
  // <!-- ****This part will be moved to index.php / top_header.php logic later**** -->
  if (isset($_SESSION['email']) && $_SESSION['email'] == true) { ?>
<li class="nav-item dropdown mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="navbardropboth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
    >Hello, ' . $_SESSION['fname'] . '! </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Viewing History</a>
          <a class="dropdown-item" href="#">Your Watchlist</a>
          <a class="dropdown-item" href="#">Your Bidding List</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Profile</a>
        </div
    </li>
    <li class="nav-item mx-1">
    <a class="nav-link" href="logout.php">Logout</a>
    </li>';
    
 <?php } else { ?>
    echo '<button type="button" class="btn nav-link" data-toggle="modal" data-target="#loginModal">Login</button>';
  <?php } ?>
?>

    </li>
  </ul>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul class="navbar-nav align-middle">
	<li class="nav-item mx-1">
      <a class="nav-link" href="browse.php">Browse</a>
    </li>

<!-- ****This part will be moved to index.php / top_header.php logic later**** -->
<?php
  if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'buyer') {
  echo('
	<li class="nav-item mx-1">
      <a class="nav-link" href="mybids.php">My Biddings</a>
    </li>
	<li class="nav-item mx-1">
      <a class="nav-link btn border-light" href="recommendations.php">Recommendations</a>
    </li>');
  }
  if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'seller') {
  echo('
	<li class="nav-item mx-1">
      <a class="nav-link" href="mylistings.php">My Listings</a>
    </li>
	<li class="nav-item ml-3">
      <a class="nav-link btn border-light" href="create_auction.php">+ Create Auction</a>
    </li>');
  }
  if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'both') {
    echo('
    <li class="nav-item mx-1">
        <a class="nav-link" href="mybids.php">My Biddings</a>
      </li>
    <li class="nav-item mx-1">
        <a class="nav-link" href="mylistings.php">My Listings</a>
      </li>
    <li class="nav-item mx-1">
      <a class="nav-link" href="recommendations.php">Recommendations</a>
    </li>
    <li class="nav-item ml-3">
        <a class="nav-link btn border-light" href="create_auction.php">+ Create Auction</a>
      </li>');
    }
?>
  </ul>
</nav>

