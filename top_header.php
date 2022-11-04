
<?php
    include 'database_connect/connect_db.php';
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- Nav Bar Right -->
  <ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Become a Seller?</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Bidding List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Bidding History</a>
    </li>
    <li class="nav-item">
      <a class="btn btn-dark" href="#" role="button">Logout</a>
    </li>
  </ul>
  <!-- Logo and Search Bar -->
  <nav class="navbar bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
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
        </div>
      </a>
    </div>
  </nav>
  <!-- This is Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>