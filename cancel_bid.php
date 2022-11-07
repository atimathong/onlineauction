

<?php function cancelBid($item_id){ ?>

<?php
include 'database_connect/connect_db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://kit.fontawesome.com/6cc5131127.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal">
        Cancel
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Would you like to cancel your bid on this item?
                </div>
                <div class="modal-footer">
                    <form action="mybids.php?id=<?php echo $item_id; ?>" method="POST"><button type="submit" class="btn btn-primary" name="cancel-bid">Yes</button></form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if(isset($_POST['cancel-bid'])){
    $user_id = $_SESSION['userid'];
    $id = mysqli_real_escape_string($db_conn, $_GET['id']);
    $cancel_query = "DELETE FROM bidding WHERE user_ID='$user_id' AND item_ID='$id'";
    if (mysqli_query($db_conn, $cancel_query)) {
        // redirect user to mybids page
        echo "<script type='text/javascript'>window.onload = function () { alert('Bid cancelled successfully'); window.location.href='mybids.php';}</script>";
        // echo "Bid created successfully";
    } else {
        echo "Error: " . $cancel_query . "<br>" . mysqli_error($db_conn);
    }
}
?>

<?php }?>