<?php
  // For now, index.php just redirects to browse.php, but you can change this
  // if you like.
  require "header.php";
?>

<main>
  <?php
    if (isset($_SESSION['email'])) {
      echo('<div class="text-center">You are now logged in! You will be redirected shortly.</div>');

      // Redirect to index after 5 seconds
      header("refresh:5;url=browse.php");  
    } else {
      echo('<div class="text-center">You are now logged out! You will be redirected shortly.</div>');

      // Redirect to index after 5 seconds
      header("refresh:5;url=browse.php"); 
    }

  ?>
</main>



<?php
  // For now, index.php just redirects to browse.php, but you can change this
  // if you like.
  require "footer.php";
?>