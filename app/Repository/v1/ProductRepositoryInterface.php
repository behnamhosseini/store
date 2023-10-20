<?php

namespace App\Repository\v1;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function find(int $id);

    public function lockForUpdate();

    public function update(Product $product);

}
