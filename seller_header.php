<?php
include 'database_connect/connect_db.php';
// keep the result check function running
include 'system_run.php';
if (!isset($_SESSION)) {
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
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6cc5131127.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div style="padding-top:4px;padding-bottom:1px;background-color:#0c141c;text-align: center;">
        <p style="color:white;font-family: 'Varela Round', sans-serif;vertical-align: middle;">Let's get a bid more bidiculous!</p>
    </div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a style="background-color:#9BB7D4;color:black;" class="nav-link active" aria-current="page" href="index.php">
                    <span class="material-symbols-outlined">house</span>
            </a>
            <a class="navbar-brand" href="#" style="width:75%;">
                <h1 class="logo" style="font-size:35px;margin-left:50%">aBidMore</h1>
            </a>
            <div class="navbar-text" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['email']) && $_SESSION['email'] == true) { ?>
                        <?php if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'seller') { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <b>Hello</b>,<?php echo $_SESSION['fname']; ?>!
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="seller_listing.php">My Selling Lists</a></li>
                                    <li><a class="dropdown-item" href="create_auction_1.php">+ Add Product</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true"><b>Hello</b>,<?php echo $_SESSION['fname']; ?>!</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="watchlist.php">My Watchlist</a></li>
                                    <li><a class="dropdown-item" href="mybids.php">My Bidding List</a></li>
                                    <li><a class="dropdown-item" href="bid_history.php">My Bidding History</a></li>
                                    <li><a class="dropdown-item" href="seller_listing.php">My Selling Lists</a></li>
                                    <li><a class="dropdown-item" href="create_auction_1.php">+ Add Product</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a style="color:white;" class="btn btn-dark" href="logout.php" role="button">Logout</a>
                        </li>
                    <?php } else { ?>
                        <ul class="nav justify-content-end but">
                            <li class="nav-item mx-1">
                                <a style="color:white;" class="btn btn-dark" href="login_page.php" role="button">Login</a>
                            </li>
                        </ul>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- This is Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>