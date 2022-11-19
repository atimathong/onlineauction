<?php
    
    function determineResult($bidPrice, $highestPrice, $bid_status)
    // can only be shown on 1 page at a time
    {
        if ($bidPrice > $highestPrice AND $bid_status == 'Finished')
        {
            return 'You Won the bidding';
        }
        elseif ($bidPrice <= $highestPrice AND $bid_status == 'Finished')
        {
            return 'You lost the bidding';

        }
        elseif ($bid_status == 'Ongoing')
        {
            return 'pending';
        }
        elseif ($bid_status == 'Upcoming')
        {
            return 'the bid has not started yet';

        }
    }
?>