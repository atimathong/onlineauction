<?php
    
    function determineResult($bidPrice, $highestPrice)
    // can only be shown on 1 page at a time
    {
        if ($bidPrice >= $highestPrice)
        {
            return 'You won the bidding!';
        }
        elseif ($bidPrice < $highestPrice)
        {
            return 'You lost the bidding.';

        }
    }
?>