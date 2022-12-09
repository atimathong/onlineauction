<?php function deleteItem($action, $db_name, $item_id, $landing_page, $db_conn)
{ ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        </link>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </link>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <!-- <script src="https://kit.fontawesome.com/6cc5131127.js" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="style.css" />
        <title>Document</title>
    </head>

    <body>
        <?php $itemid  = ""; ?>
        <!-- Button trigger modal -->
        <button type="button" value="<?= $item_id ?>"  class="btn btn-danger deletebtn">
                <?php echo $action; ?>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $action; ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo $landing_page?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <?php if ($db_name == "item" || $db_name == "watchlist") {
                            echo "Would you like to remove this item?";
                            echo $itemid;
                        } elseif ($db_name == "bidding") {
                            echo "Would you like to cancel you bid on this item?";
                            echo $itemid;
                        } ?>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="deletedata" class="btn btn-primary">Yes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

<?php

if (isset($_POST["deletedata"])) {
    $user_id = $_SESSION['userid'];
    $delid = $_POST['delete_id'];
    $name_query = "";
    $del_query = "";
    if ($db_name == "item") {
        $del_query = "DELETE FROM item WHERE seller_ID='$user_id' AND item_ID='$delid'";
    } elseif ($db_name == "watchlist" || $db_name == "bidding") {
        $del_query = "DELETE FROM $db_name WHERE buyer_ID='$user_id' AND item_ID='$delid'";
        $name_query = "SELECT * FROM item WHERE item_ID='$delid'";
        $result = mysqli_query($db_conn, $name_query);
        $itemName = mysqli_fetch_assoc($result)['item_name'];
    }
    if (mysqli_query($db_conn, $del_query)) {
        if ($landing_page == "mybids.php") {
            echo "<script type='text/javascript'>window.onload = function () { alert('Bid on $itemName cancelled successfully'); window.location.href='mybids.php';}</script>";
        } elseif ($landing_page == "seller_listing.php") {
            echo "<script type='text/javascript'>window.onload = function () { alert('Product deleted successfully'); window.location.href='seller_listing.php';}</script>";
        } else {
            // watchlist.php
            echo "<script type='text/javascript'>window.onload = function () { alert('$itemName removed successfully'); window.location.href='watchlist.php';}</script>";
        }
    } else {
        echo "Error: " . $del_query . "<br>" . mysqli_error($db_conn);
    }
}
?>

<?php } ?>