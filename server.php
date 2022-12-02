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

</body>

</html>


<?php
if (!isset($_SESSION)) {
    session_start();
  }

include_once 'database_connect/connect_db.php'; //connect to db
$email = $_SESSION['email'];

//Initialising variable

$password = "";
//error message
$errors = array();


//Register users
if (isset($_POST['reg_user'])) {
    $firstname = mysqli_real_escape_string($db_conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db_conn, $_POST['lastname']);
    
    $password_1 = mysqli_real_escape_string($db_conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db_conn, $_POST['password_2']);
    $addressline_1 = mysqli_real_escape_string($db_conn, $_POST['addressline_1']);
    $addressline_2 = mysqli_real_escape_string($db_conn, $_POST['addressline_2']);
    $postal_code = mysqli_real_escape_string($db_conn, $_POST['postal_code']);
    $phone_number = mysqli_real_escape_string($db_conn, $_POST['phone_number']);
    $user_type = mysqli_real_escape_string($db_conn, $_POST['user_type']);

    //form validation
    if (empty($firstname)) {
        array_push($errors, "First name is required");
    };
    if (empty($lastname)) {
        array_push($errors, "Last name is required");
    };
   /*  if (empty($email)) {
        array_push($errors, "Email is required");
    }; */
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     array_push($errors, "Invalid email format");
    // };
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    };
    if ($password_1 != $password_2) {
        array_push($errors, "Passwords do not match");
    }
    if (empty($addressline_1)) {
        array_push($errors, "Address is required");
    };
    if (empty($postal_code)) {
        array_push($errors, "Postal code is required");
    };
    if (empty($phone_number)) {
        array_push($errors, "Phone number is required");
    };
    if (empty($user_type)) {
        array_push($errors, "User type is required");
    };

    //check db for existing user with same username

    //$user_check_query = "SELECT * FROM users WHERE email= '$email' LIMIT 1";
    //$result = mysqli_query($db_conn, $user_check_query);
    //$user = mysqli_fetch_assoc($result);

    /* if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, "Email already registered.");
        }
    } */

    //Register the user if no error
    if (count($errors) === 0) {
        

        $password = md5($password_1); //encrypt the password
        $query = "INSERT INTO users (firstname, lastname, email, password, addressline_1, addressline_2, postal_code, phone_number, user_type) 
        VALUES ('$firstname','$lastname','$email','$password','$addressline_1', '$addressline_2', '$postal_code', '$phone_number', '$user_type'
        )";
        mysqli_query($db_conn, $query);
        $curEmail = $_SESSION['email'];

        $sql = "SELECT * FROM users WHERE email = '$curEmail';";
        $result = mysqli_query($db_conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['fname'] = $row['firstname'];
                $_SESSION['userid'] = $row['user_ID'];
                $_SESSION['account_type'] = $row['user_type'];
            }
        }


        echo '<div class="text-center">
            <div class="spinner-border m-5" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h4 class="log-text">You are now registered! You will be redirected shortly.</h4>
        </div>';
        header('refresh:2;url=index.php');
        exit();
    }
}


?>