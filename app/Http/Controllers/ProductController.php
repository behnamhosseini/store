<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyProductRequest;
use App\Service\BuyProductUseCase;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $buyProductUseCase;

    public function __construct(BuyProductUseCase $buyProductUseCase)
    {
        $this->buyProductUseCase = $buyProductUseCase;
    }

    public function buyProduct(BuyProductRequest $request)
    {
        try {
            $this->buyProductUseCase->execute($request->product_id,$request->quantity);
            return response()->json(['message' => 'خرید با موفقیت انجام شد']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


}
