<?php

namespace App\Repository\v1;

use App\Models\Order;
use App\Models\Transaction;

class OrderRepository implements OrderRepositoryInterface
{

    public function create(Order $order)
    {
        return $order->save();
    }
}
