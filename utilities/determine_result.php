<?php
    
    function determineResult($bidPrice, $highestPrice, $reserve_price)
    // can only be shown on 1 page at a time
    {   
        if($highestPrice<$reserve_price){
            return 'Unsuccessful bidding due to unreachable reserved price.';
        }
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