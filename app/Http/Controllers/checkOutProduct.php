<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class checkOutProduct extends Controller
{
    public function addToCart(Request $request)
    {
        $product = $request->request->all()['product'];
        $user = auth()->user();
        $productId = decrypt($product['id']);
        $productName = $product['name'];
        $price = $product['price'];
        $taxRate = 0.18;
        $quantity = 1;
        $orderNumber = 10000;
        $photo = $product['media']['url_main'];

        $productEntity = Product::where('id', $productId)->first();

        if (!is_null($user)) {
            $idLineItem = Uuid::uuid4()->toString();

            if (Cart::where('user_id', $user['id'])->first() == null) {
                $orderId = Uuid::uuid4()->toString();
                $data = [
                    'line_items' => [
                        $productId => [
                            'id' => $idLineItem,
                            'product_id' => $productId,
                            'product_name' => $productName,
                            'orderId' => $orderId,
                            'quantity' => $quantity,
                            'price' => [
                                'totalPrice' => $price,
                                'netPrice' => $price - $price * $taxRate,
                                'tax' => $taxRate,
                            ],
                            'photo'=> $photo
                        ]
                    ],

                    'order' => [
                        $orderId => [
                            'id' => $orderId,
                            'user_id' => $user['id'],
                            'order_number' => $orderNumber,
                            'price' => [
                                'totalPrice' => $price,
                                'grossPrice' => $price - $price * $taxRate,
                                'netPrice' => $taxRate,
                            ],
                            'shipping_costs' => $orderId,
                            'shipping_status' => $quantity,
                        ]
                    ],
                    'userEntity' => [
                        $user
                    ],

                    'product' => [
                        $productEntity
                    ],
                ];

                Cart::create(
                    [
                        'id' => $idLineItem,
                        'price' => $price,
                        'line_item_count' => 1,
                        'order_id' => $orderId,
                        'shipping_status' => 'test',
                        'country_id' => 'test',
                        'user_id' => $user['id'],
                        'payload' => serialize($data),
                    ]
                );
            } else {
                if (isset(unserialize(Cart::where('user_id', $user['id'])->first()['payload'])['line_items'][$productId])) {
                    $existingPayload = Cart::where('user_id', $user['id'])->first()->payload;
                    $payloadObj = unserialize($existingPayload);
                    $payloadObj['line_items'][$productId]['quantity'] += 1;
                    $updatedPayload = serialize($payloadObj);
                    Cart::where('user_id', $user['id'])->first()->update(['payload' => $updatedPayload]);
                } else {
                    $orderId = Cart::where('user_id', $user['id'])->first()['order_id'];

                    $dataLineItem = [
                        'id' => $idLineItem,
                        'product_id' => $productId,
                        'product_name' => $productName,
                        'orderId' => $orderId,
                        'quantity' => $quantity,
                        'price' => [
                            'totalPrice' => $price,
                            'netPrice' => $price - $price * $taxRate,
                            'tax' => $taxRate,
                        ],
                        'photo'=> $photo
                    ];

                    $existingPayload = Cart::where('user_id', $user['id'])->first()->payload;
                    $payloadObj = unserialize($existingPayload);
                    $payloadObj['line_items'][$productId] = $dataLineItem;

                    $updatedPayload = serialize($payloadObj);
                    Cart::where('user_id', $user['id'])->first()->update(['payload' => $updatedPayload]);
                }
            }

            $lineItems = unserialize(Cart::where('user_id', $user['id'])->first()['payload'])['line_items'];
            $orderId = Cart::where('user_id', $user['id'])->first()['order_id'];

            $totalPriceTable = 0;
            foreach ($lineItems as $lineItem) {
                $totalPriceTable += $lineItem['price']['totalPrice'] * $lineItem['quantity'];
            }
            $totalPrice = $totalPriceTable;

            $dataOrder = [
                'id' => $orderId,
                'user_id' => $user['id'],
//                'order_number' => $productName,
                'price' => [
                    'totalPrice' => $totalPrice,
                    'grossPrice' => $totalPrice - $totalPrice * $taxRate,
                    'tax' => $taxRate,
                ],
                'shipping_costs' => $orderId,
                'shipping_status' => $quantity,
            ];

            $newCart = Cart::where('user_id', $user['id'])->first();
            $countLineItem = count(unserialize($newCart->payload)['line_items']);
            $newCart->price = $totalPrice;
            $newCart->line_item_count = $countLineItem;
            $newCart->save();

            $existingPayload = Cart::where('user_id', $user['id'])->first()->payload;
            $payloadObj = unserialize($existingPayload);
            $payloadObj['order'][$user['id']] = $dataOrder;
            $updatedPayload = serialize($payloadObj);
            Cart::where('user_id', $user['id'])->first()->update(['payload' => $updatedPayload]);

            $cart = Cart::all()->first();
            return view('cart', ['cart' => unserialize($cart['payload'])]);
        }
    }
    public function deleteFromCart($lineItemId)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', auth()->user()['id'])->first();
        $payload = unserialize($cart['payload']);
        unset($payload['line_items'][$lineItemId]);
        $cart->payload = serialize($payload);
        $cart->save();

        $lineItems = unserialize(Cart::where('user_id', $user['id'])->first()['payload'])['line_items'];
        $totalPriceTable = 0;
        foreach ($lineItems as $lineItem) {
            $totalPriceTable += $lineItem['price']['totalPrice'] * $lineItem['quantity'];
        }
        $totalPrice = $totalPriceTable;
        $newCart = Cart::where('user_id', $user['id'])->first();
        $newCart->price = $totalPrice;
        $newCart->line_item_count = count($lineItems);
        $newCart->save();
        if ($newCart['line_item_count'] == 0) {
            $newCart->delete();
        }

    }
}
