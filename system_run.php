<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(setInterval(function() {
            $("#div1").load("bidding_result.php");
        }, 5000));
    </script>
</head>

<body>
    <div id="div1"></div>
</body>

</html>