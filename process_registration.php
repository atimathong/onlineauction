

// TODO: Extract $_POST variables, check they're OK, and attempt to create
// an account. Notify user of success/failure and redirect/give navigation 
// options.



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
                <label for="lastname">Last Name : </label>
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
                <label for="addressline_1">Address Line 1 : </label>
                <input type="text" name="addressline_1">
            </div>
            <div>
                <label for="addressline_2">Address Line 2 : </label>
                <input type="text" name="addressline_2">
            </div>
            <div>
                <label for="postalcode">Postal Code : </label>
                <input type="text" name="postal_code">
            </div>
            <div>
                <label for="phonenumber">Phone Number : </label>
                <input type="text" name="phone_number">
            </div>
            <div>
                <label for="usertype">User Type : </label>
                <input type="text" name="user_type">
            </div>
            <button type="submit" name="reg_user"> Submit </button>

            <p>Already a user?<a href="login_me.php"><b> Log in </b></a></p>
        </form>
    </div>
</body>
</html>