<?php
include_once 'top_header.php';
?>

<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    $item_id = mysqli_real_escape_string($db_conn, $_GET['id']);
    // Prepare statement and execute, prevents SQL injection
    $detail_query = "SELECT * FROM item JOIN category ON item.category_ID = category.category_ID WHERE item_ID = '$item_id'";
    // Fetch the product from the database and return the result as an Array
    $detail_result = mysqli_query($db_conn, $detail_query);
    // Check if the product exists (array is not empty)
    if (mysqli_num_rows($detail_result) === 0) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        echo 'Product does not exist!';
    }
}
?>

<?php
$item_row = mysqli_fetch_assoc($detail_result);
$_SESSION["item_detail"] = $item_row;
?>

<!-- product detail page -->

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
    <title>Document</title>
</head>

<body>
    <form action="create_bid.php" method="POST">
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image" src="pictures/<?= $item_row['picture'] ?>" width="350" /></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1"><a href="index.php"> Back</a></span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                    </div>
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?= $item_row['category'] ?></span>
                                        <h5 class="text-uppercase"><?= $item_row['item_name'] ?></h5>
                                        <div class="price d-flex flex-row align-items-center">
                                            <span class="act-price">Start from &pound;<?= $item_row['starting_price'] ?></span>
                                        </div>
                                    </div>
                                    <p class="about"><b>Condition: </b><?= $item_row['cond'] ?></p>
                                    <p class="about"><b>Bid status: </b><?= $item_row['bidding_status'] ?></p>
                                    <?php if ($item_row['bidding_status'] === "on-going") { ?>
                                        <!-- add timer display -->
                                        <p class="about">
                                        <h6>Time left:</h6>
                                        </p>
                                    <?php }; ?>
                                    <hr>
                                    <p class="about"><?= $item_row['pro_desc'] ?></p>
                                    <hr>
                                    <div class="sizes mt-5">
                                        <h6 class="text-uppercase">Start bidding</h6>
                                        <input type="number" name="bid_price" value="bid_price" min="<?=$item_row['starting_price']?>" placeholder="&pound; Bid price" required>
                                        <input type="hidden" name="product_id" value="<?= $item_row['item_ID'] ?>">
                                    </div>
                                    <div class="cart mt-4 align-items-center">
                                        <button class="btn btn-danger text-uppercase mr-2 px-4" type="submit" name="submit-bid">Submit Bid</button>
                                    </div>
                                    <div class="cart mt-4 align-items-center">
                                        <button class="btn btn-danger text-uppercase mr-2 px-4" type="submit" name="watchllist"><i class="fa fa-heart text-muted"></i> Watch this item</button>
                                    </div>
                                    <hr>
                                    <p class="about"><b>Return: </b>No returns accepted</p>
                                    <p class="about"><b>Delivery: </b> Royal Mail Service / DHL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<?php include_once 'bottom_footer.php'; ?>