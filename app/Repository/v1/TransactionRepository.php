<?php

namespace App\Repository\v1;

use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function create(Transaction $transaction)
    {
        return $transaction->save();
    }

    public function update(Transaction $transaction)
    {
        return $transaction->save();
    }
}
