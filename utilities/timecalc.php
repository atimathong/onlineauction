<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    
    function bidStatusUpdate($bid_item)
    // can only be shown on 1 page at a time
    {

        $start_date = $bid_item['sta_date'];
        $start_time = $bid_item['start_time'];
        $start_datetime = strtotime("$start_date" . " " . "$start_time");

        $end_date = $bid_item['end_date'];
        $end_time = $bid_item['end_time'];
        $end_datetime = strtotime("$end_date" . " " . "$end_time");
    ?>
        <script type="text/javascript">
            let startDateTime = <?php echo $start_datetime ?> * 1000;
            let endDateTime = <?php echo $end_datetime ?> * 1000;
            let now = <?php echo time() ?> * 1000;

            let sts = setInterval(function() {
                now = now + 1000;

                // Find the distance between now an the end date
                let distanceToEnd = endDateTime - now;
                let distanceFromStart = now - startDateTime;
                let sts = "";

                if (distanceToEnd > 0 && distanceFromStart > 0) {
                    sts = "Ongoing";
                    document.getElementById("status").innerHTML = "Ongoing";
                } else if (distanceFromStart < 0) {
                    sts = "Upcoming";
                    document.getElementById("status").innerHTML = "Upcoming";
                } else if (distanceToEnd < 0) {
                    sts = "Finished";
                    document.getElementById("status").innerHTML = "Finished";
                }

            }, 1000)
        </script>
        <?php 
        return  '<html><body><p id="status" style="font-size:16px;color:black;"></p></body></html>';
        ?>


    <?php }

    function timeleft($bid_item)
    // Aim to use for time counting down in product detail page
    { ?>
        <?php
        $end_date = $bid_item['end_date'];
        $end_time = $bid_item['end_time'];
        $end_datetime = strtotime("$end_date" . " " . "$end_time");
        ?>

        <script type="text/javascript">
            let endDate = <?php echo $end_datetime ?> * 1000;
            let now = <?php echo time() ?> * 1000;
            // Update the count down every 1 second

            let x = setInterval(function() {
                now = now + 1000;

                // Find the distance between now an the end date
                let distance = endDate - now;
                // Time calculations for years,days, hours, minutes and seconds
                let years = Math.floor(distance / (1000 * 365 * 60 * 60 * 24));
                let months = Math.floor((distance - years * 1000 * 365 * 60 * 60 * 24) / (1000 * 30 * 60 * 60 * 24))
                let days = Math.floor((distance - years * 1000 * 365 * 60 * 60 * 24 - months * 1000 * 30 * 60 * 60 * 24) / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance - years * 1000 * 365 * 60 * 60 * 24 - months * 1000 * 30 * 60 * 60 * 24 - days * 1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                let minutes = Math.floor((distance - years * 1000 * 365 * 60 * 60 * 24 - months * 1000 * 30 * 60 * 60 * 24 - days * 1000 * 60 * 60 * 24 - hours * 1000 * 60 * 60) / (1000 * 60));
                let seconds = Math.floor((distance - years * 1000 * 365 * 60 * 60 * 24 - months * 1000 * 30 * 60 * 60 * 24 - days * 1000 * 60 * 60 * 24 - hours * 1000 * 60 * 60 - minutes * 1000 * 60) / 1000);
                // Output the result in an element with id="timer"
                document.getElementById("timer").innerHTML = "";
                if (years > 0) {
                    document.getElementById("timer").innerHTML += years + "y ";
                }
                if (months > 0) {
                    document.getElementById("timer").innerHTML += months + "m ";
                }
                if (days > 0) {
                    document.getElementById("timer").innerHTML += days + "d ";
                }
                if (hours > 0) {
                    document.getElementById("timer").innerHTML += hours + "h ";
                }
                if (minutes > 0) {
                    document.getElementById("timer").innerHTML += minutes + "m ";
                }
                if (seconds > 0) {
                    document.getElementById("timer").innerHTML += seconds + "s ";
                }
                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = "EXPIRED";
                }

            }, 1000);
        </script>

        <?php
        return '<html><body><p id="timer" style="font-size:16px;color: rgb(228, 48, 48);"></p></body></html>';
        ?>

    <?php }
    ?>
</body>

</html>