<?php

namespace App\Helpers;

use App\Models\Order;

class LoyaltyPointCalculator
{
    public function calculate(Order $order)
    {
        // Assuming a simple calculation based on order total
        $loyaltyPoints = floor($order->total_price);

        return $loyaltyPoints;
    }
}
