<?php

session_start();

unset($_SESSION['logged_in']);
unset($_SESSION['account_type']);
setcookie(session_name(), "", time() - 360);
session_destroy();

#dmkdn
// Redirect to index
// ddmcke
header("Location: index.php");

?>