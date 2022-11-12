<?php
    
    function bidStatus($bid_item)
    // can only be shown on 1 page at a time
    {

        $start_date = $bid_item['sta_date'];
        $start_time = $bid_item['start_time'];
        $start_datetime = strtotime("$start_date" . " " . "$start_time");

        $end_date = $bid_item['end_date'];
        $end_time = $bid_item['end_time'];
        $end_datetime = strtotime("$end_date" . " " . "$end_time");

        $now = time();

        $diffToEnd = round(abs($end_datetime - $now),2);
        $diffFromStart = round(abs($now - $start_datetime),2);

        $status = "";

        if ($diffToEnd  > 0 && $diffFromStart > 0) {
            $status = "Ongoing";

        } else if ($diffFromStart < 0) {
            $status = "Upcoming";
     
        } else if ($diffToEnd  < 0) {
            $status = "Finished";
        }

        return $status;
}
?>