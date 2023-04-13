<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProductPageController extends Controller
{
    public function productPage(Request $request)
    {
        return view('productPage');
    }

    public function productData(Request $request)
    {
        $isLogin = Auth::check();
        $user = auth()->user();
        $product = Product::where('active',true)->with('media')->get();
        $data = [];
        if ($product){
            $data['products'] = $product;
        }
        $data['cart'] = [];
        $data['account'] = [];
        if ($isLogin == true){
            $data['account'] = [
                'name' => auth()->user()['name'],
                'id' => auth()->user()['id'],
                'isLogin' =>$isLogin
            ];
            if (Media::where('user_id', auth()->user()['id'])->first()){
                $data['account']['url'] = Media::where('user_id', auth()->user()['id'])->first()['url'];
            }

            $cart = Cart::where('user_id', $user['id'])->first();
            if ($cart){
                $dataCartPayload = unserialize($cart['payload']);
                $data['cart'] = [
                    'cart'=>$cart,
                    'payload'=>$dataCartPayload,
                    'order'=>$dataCartPayload['order'][auth()->user()['id']],
                    'price'=>$dataCartPayload['order'][auth()->user()['id']]['price']
                ];
            }
        }else{
            $data['account'] = $isLogin;
        }

        return $data;
    }

    public function insideProductPage(Request $request, $productTitle, $productNumber){

        $product = Product::where('product_number', $productNumber)
            ->where('name', $productTitle)
            ->first();
        if (!$product) {
            abort(404);
        }
        $id = '06805208-50a7-415a-aad3-31e8988fd328';


        return view('inProductPage', [
            'id'=>Crypt::encryptString($id),
            'productTitle' => $productTitle,
            'productNumber'=>$productNumber
        ]);
    }
}
