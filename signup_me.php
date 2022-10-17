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
            <h2>Register</h2>
        </div>

        <form action="signup_me.php" method="post">

            <?php include 'error_me.php' ?>
            <div>
                <label for="firstname">First Name : </label>
                <input type="text" name="firstname" required>
            </div>
            <div>
                <label for="Lastname">Last Name : </label>
                <input type="text" name="lastname" required>
            </div>
            <div>
                <label for="email">Email : </label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password : </label>
                <input type="password" name="password_1" required>
            </div>
            <div>
                <label for="password">Confirm Password : </label>
                <input type="password" name="password_2" required>
            </div>
            <div>
                <label for="address">Address : </label>
                <input type="text" name="address">
            </div>
            <button type="submit" name="reg_user"> Submit </button>

            <p>Already a user?<a href="login_me.php"><b> Log in </b></a></p>
        </form>
    </div>
</body>
</html>