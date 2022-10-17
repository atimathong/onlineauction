<?php include 'server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="header">
            <h2>Sign in</h2>
        </div>
        <form action="login_me.php" method="post">
            <?php include 'error_me.php' ?>
            <div>
                <label for="email">Email : </label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password : </label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="login_user"> Log in </button>

        </form>
    </div>
</body>
</html>