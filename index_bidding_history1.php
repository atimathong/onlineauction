<?php
session_start();?>
<?php include "./connect_db.php";?>
<?php include_once './top_header.php';?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Bidding history lists</title>
    
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:red;">Hello!  
<?php $login_email = $_SESSION['email'] ;

  // $userNameSQL = "SELECT firstname, lastname from users where email= $email"; 
  // echo $userNameSQL;
  $userNameSQL = "SELECT * from users where users.email= '$login_email' "; 
	      $result = mysqli_query($db_conn, $userNameSQL);
	      $row = mysqli_fetch_assoc($result);
        echo $row["firstname"] . " " . $row["lastname"];
  //  if ( false===$result ) {
  //       printf("error: %s\n", mysqli_error($db_conn));
  //       }
  //       else {
  //       echo 'done.';
  //       }
  ?>  
        </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/onlineauction/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Previous Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/onlineauction/logout.php">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <div class="container-fuild">
    
        <table class="table">
            <thead class="table-dark">
              <tr><h1 style="text-align:center">Bidding history lists</h1></tr>
                <tr>
                    <th style="width:15%"> Product Name</th>
                    <th> Bid ID</th>
                    <th> Product Name</th>
                    <th> Product ID</th>
                    <th> Picture</th>
                    <th> Status</th>
                    <th> Your price</th>
                    <th> Highst price</th>
                    <th> result</th>
                    <th> Price</th>
                </tr>
            </thead>
            <tbody>
              <?php
                 $mail = $_SESSION['email'] ;
                 echo $mail . 'ed';
                //  $sql = "SELECT * FROM bidding JOIN item ON bidding.item_ID = item.item_ID JOIN users ON users.user_ID = bidding.buyer_ID WHERE users.user_type IN ('buyer', 'both') AND users.email = '$email'";  # select data from sql table
                // //  echo $sql;
                //  $result = mysqli_query($db_conn, $sql); # send a query to the database
                // //  echo $result["user_ID"];
                //  $resultCheck = mysqli_num_rows($result); # check if you can get the data from the database
                // //  echo $resultCheck;
                // // #fetch the data into an array
                // if ($resultCheck > 0) {
                //     while ($row = mysqli_fetch_assoc($result)) {
                //         echo "<tr> <td>" . $row["bid_ID"] . "</td><td>" . $row["item_name"] . "</td><td>" . $row["item_ID"] . "</td><td>" . "<img src='../pictures/" . $row["picture"] . "' width='200' height='200'>"  . "</td><td>" . $row["starting_price"] . "</td><td>" . $row["sta_date"] . "</td><td>" . $row["end_date"] . "</td><td>" . $row["bidding_status"] . " <td></tr>";
                //     }
                // } else {
                //     echo "No result";
                // }
                // $conn->close()
                ?>

        
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</div>

</html> 


