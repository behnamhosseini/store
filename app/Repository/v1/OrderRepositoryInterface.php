<?php

namespace App\Repository\v1;

use App\Models\Order;

interface OrderRepositoryInterface
{

    public function create(Order $transaction);
}
