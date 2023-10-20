<?php

namespace App\Repository\v1;

use App\Models\Transaction;

interface TransactionRepositoryInterface
{

    public function create(Transaction $transaction);
    public function update(Transaction $transaction);

}
