<?php
session_start();
include_once './inc_seller_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fuild">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th> Product Name</th>
                    <th> Product Category</th>
                    <th> Product ID</th>
                    <th> Picture</th>
                    <th> Start Price</th>
                    <th> Bid start date</th>
                    <th> Bid end date</th>
                    <th> Status</th>
                    <th> View rates</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM item JOIN category ON item.category_ID = category.category_ID JOIN users ON item.user_ID = users.user_id WHERE users.user_type IN ('seller' , 'both') AND users.email = '$email'";  # select data from sql table
                $result = mysqli_query($conn, $sql); # send a query to the database
                $resultCheck = mysqli_num_rows($result); # check if you can get the data from the database
                echo $resultCheck;
                #fetch the data into an array
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr> <td>" . $row["item_name"] . "</td><td>" . $row["category"] . "</td><td>" . $row["item_ID"] . "</td><td>" . $row["picture"] . "</td><td>" . $row["starting_price"] . "</td><td>" . $row["sta_date"] . "</td><td>" . $row["end_date"] . "</td><td>" . $row["bidding_status"] . " <td></tr>";
                    }
                } else {
                    echo "No result";
                }
                $conn->close()

                ?>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</div>

</html>