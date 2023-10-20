<?php

namespace App\Repository\v1;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    public function find(int $id)
    {
        return Product::find($id);
    }

    public function lockForUpdate()
    {
        return Product::lockForUpdate();
    }

    public function update(Product $product)
    {
        return $product->save();
    }
}
