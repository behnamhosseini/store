<?php

namespace App\Service;

use App\Events\OrderStoredEvent;
use App\Jobs\d;
use App\Models\Order;
use App\Models\Transaction;
use App\Repository\v1\OrderRepository;
use App\Repository\v1\ProductRepository;
use App\Repository\v1\TransactionRepository;
use App\Repository\v1\UserRepository;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;


class BuyProductUseCase
{

    public function __construct(
        public ProductRepository     $productRepository,
        public UserRepository        $userRepository,
        public TransactionRepository $transactionRepository,
        public OrderRepository       $orderRepository
    )
    {
    }

    public function execute(int $productId, int $quantity)
    {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->lockForUpdate()->find(auth()->id());
            $product = $this->productRepository->lockForUpdate()->find($productId);


            if (!$user || !$product) {
                throw new \Exception('کاربر یا محصول مورد نظر یافت نشد.');
            }

            if ($user->balance < ($product->price * $quantity)) {
                throw new \Exception('اعتبار کاربر کافی نیست.');
            }

            if ($quantity > $product->quantity) {
                throw new \Exception('تعداد کالای درخواستی بیشتر از تعداد موجودی میباشد.');
            }

            $price = ($quantity * $product->price);
            $this->createOrder($user->id, $product->id, $quantity, $price);


            $user->balance -= $price;
            $this->userRepository->update($user);

            $product->quantity -= $quantity;
            $this->productRepository->update($product);

            $this->createTransaction($user->id, $product->id, $quantity, 'success');

            OrderStoredEvent::dispatch(['message' => 'خرید با موفقیت انجام شد.', 'phone' => $user->phone]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->createTransaction($user->id, $product->id, $quantity, 'failed');
            throw $e;
        }
    }

    /**
     * @param $user_id
     * @param $product_id
     * @param $quantity
     * @param $price
     */
    public function createOrder($user_id, $product_id, $quantity, $price): void
    {
        $order = new Order();
        $order->user_id = $user_id;
        $order->product_id = $product_id;
        $order->quantity = $quantity;
        $order->amount = $price;
        $this->orderRepository->create($order);
    }

    /**
     * @param $user_id
     * @param $product_id
     * @param $quantity
     * @param $status
     */
    public function createTransaction($user_id, $product_id, $quantity, $status): void
    {
        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->product_id = $product_id;
        $transaction->quantity = $quantity;
        $transaction->status = $status;
        $this->transactionRepository->create($transaction);

    }
}
