<?php

session_start();

// if(isset($_SESSION['email'])){
//     $_SESSION['msg'] = "You must log in first to view this page";
//     header("location: login_me.php");
// }

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['email']);

    header("location: login_me.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>This is the homepage</h1>
    <?php
        if(isset($_SESSION['success'])):
    ?>
    <div>
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']); ?>
        </h3>
    </div>
    <?php endif ?>
    <?php if(isset($_SESSION['email'])): ?>
        <h3>Welcome <strong><?php echo $_SESSION['email']; ?></strong></h3>

        <button><a href="index_me.php?logout='1'">Log out</a></button>
        
    <?php endif ?>
</body>
</html>