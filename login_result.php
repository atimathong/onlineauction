<?php
include_once "database_connect/connect_db.php"; ?>
<!-- // TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.
// For now, I will just set session variables and redirect. -->

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
</html>
<?php
$email = "";
$password = "";
//error message
$errors = array();

//Login user
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db_conn, $_POST['email']);
    $password = mysqli_real_escape_string($db_conn, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) === 0) {
        $email = $email;
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email ='$email' AND password='$password'";

        $results = mysqli_query($db_conn, $query);

        //echo mysqli_num_rows($results);
        if (mysqli_num_rows($results) == 1) {
            session_start();
            $_SESSION['email'] = $email;
            $curEmail = $_SESSION['email'];

            $sql = "SELECT * FROM users WHERE email = '$curEmail';";
            $result = mysqli_query($db_conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['fname'] = $row['firstname'];
                    $_SESSION['userid'] = $row['user_id'];
                    $_SESSION['account_type'] = $row['user_type'];
                }
            }

            echo '<div class="text-center">
                    <div class="spinner-border m-5" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <h4 class="log-text">You are now logged in! You will be redirected shortly.</h4>
                </div>';
            header('refresh:2;url=index.php');

            exit();
        } else {
            // This part should be in the same page as register or login
            echo '<h3>Error</h3>';
            array_push($errors, "Your username or password is invalid. Please try again!");
            include 'error_msg.php';
            // header('location: index.php');
            exit();
        }
    } else {
        include 'error_msg.php';
    }
}
?>