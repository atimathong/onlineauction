<?php
include_once "dbh.php";
// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.

$email = "";
$password = "";
//error message
$errors = array();
//connect to db
$conn = mysqli_connect('localhost', 'root', 'root', 'db') or die('could not connect to database');

//Login user
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is requirconn");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) === 0) {
        $email = $email;
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email ='$email' AND password='$password'";

        $results = mysqli_query($conn, $query);

        //echo mysqli_num_rows($results);
        if (mysqli_num_rows($results)==1) {
            session_start();
            $_SESSION['email'] = $email;
            $curEmail = $_SESSION['email'];
  
            $sql = "SELECT * FROM users WHERE email = '$curEmail';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['fname'] = $row['firstname'];
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['account_type'] = $row['user_type'];
            }
            }

            header('location: index.php');

            
            exit();
        } else {
            echo '<p>error </>';
            array_push($errors, "Please try again!");
            header('location: index.php');
            exit();
        }
    }
}

?>