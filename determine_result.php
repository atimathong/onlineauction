<?php
    
    function determineResult($bidPrice, $highestPrice)
    // can only be shown on 1 page at a time
    {
        if ($bidPrice >= $highestPrice)
        {
            return 'You Won the bidding';
        }
        elseif ($bidPrice < $highestPrice)
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