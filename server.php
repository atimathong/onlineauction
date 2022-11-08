<?php
    include_once 'database_connect/connect_db.php'; //connect to db

//session_start();
//Initialising variable
$email = "";
$password = "";
//error message
$errors = array();


//Register users
if (isset($_POST['reg_user'])) {
    $firstname = mysqli_real_escape_string($db_conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db_conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($db_conn, $_POST['email']);
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
    if(empty($email)){
        array_push($errors, "Email is required");
    };
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Invalid email format");
    };
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

    $user_check_query = "SELECT * FROM users WHERE email= '$email' LIMIT 1";
    $result = mysqli_query($db_conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, "Email already registered.");
        }
    }

    //Register the user if no error
    if (count($errors) === 0) {
        $password = md5($password_1); //encrypt the password
        $query = "INSERT INTO users (firstname, lastname, email, password, addressline_1, addressline_2, postal_code, phone_number, user_type) 
        VALUES ('$firstname','$lastname','$email','$password','$addressline_1', '$addressline_2', '$postal_code', '$phone_number', '$user_type'
        )";
        mysqli_query($db_conn, $query);
        session_start();
        $_SESSION['email'] = $email;
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

        header('location: index.php');
        exit();
    }
}


?>
