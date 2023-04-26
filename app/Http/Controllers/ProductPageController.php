<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Domain;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProductPageController extends Controller
{
    public function productPage(Request $request)
    {
        $categories = Category::where('visible', true)->get();
        $categories->each(function ($category) {
            unset($category->created_at);
            unset($category->updated_at);
            unset($category->visible);
        });
        return view('productPage', ['categories'=>$categories, 'categoryName' => null]);
    }

    public function productData(Request $request)
    {
        $categoryName = $request->request->all()['category'];
        $isLogin = Auth::check();
        $user = auth()->user();

        $domain = Domain::where('active', true)->first()['domain'];
        if (is_null($categoryName)){
            $product = Product::where('active', true)
                ->with('media')
                ->with('category')
                ->select('id', 'name', 'product_number', 'category_id','description', 'stock', 'active', 'parent_id', 'tax_status', 'product_manufacturer_id', 'product_media_id', 'price', 'custom_fields')
                ->get()
                ->map(function ($product) {
                    $product->id = encrypt($product->id);
                    $media = $product->media;
                    if ($media) {
                        $media->product_id = encrypt($media->product_id);
                        unset($media->product_id, $media->created_at, $media->updated_at);
                    }
                    $category = $product->category;
                    if ($category) {
                        unset($category->created_at, $category->updated_at, $category->visible);
                    }
                    return $product;
                });
        }else {
            $product = Product::where('active', true)
                ->with('media')
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryName) {
                    $query->where('name', $categoryName);
                })
                ->select('id', 'name', 'product_number', 'category_id','description', 'stock', 'active', 'parent_id', 'tax_status', 'product_manufacturer_id', 'product_media_id', 'price', 'custom_fields')
                ->get()
                ->map(function ($product) {
                    $product->id = encrypt($product->id);
                    $media = $product->media;
                    if ($media) {
                        $media->product_id = encrypt($media->product_id);
                        unset($media->product_id, $media->created_at, $media->updated_at);
                    }
                    $category = $product->category;
                    if ($category) {
                        unset($category->created_at, $category->updated_at, $category->visible);
                    }
                    return $product;
                });
        }

        $data = [];
        if ($product){
            $data['products'] = $product;
            $data['domain'] = $domain;
        }
        $data['cart'] = [];
        $data['account'] = [];
        if ($isLogin == true){
            $data['account'] = [
                'name' => auth()->user()['name'],
                'id' => auth()->user()['id'],
                'isLogin' =>$isLogin
            ];

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

        $id = decrypt($request->query->all()['id']);

        $product = Product::where('id', $id)->where('name', $productTitle)->where('product_number', $productNumber)->with('media')->get()->first();
        if (!$product) {
            abort(404);
        }
        $domain = Domain::where('active', true)->first()['domain'];
        if (!is_null($product->media)){
            $images = json_decode($product->media['url_additional']);

            if ($images){
                $images = array_map(function($image) use ($domain) {
                    return  $image;
                }, $images);
            }
            $productData = [
                'name'=> $product['name'],
                'description'=> $product['description'],
                'stock'=> $product['stock'],
                'tax_status'=> $product['tax_status'],
                'price'=> $product['price'],
                'media'=> [
                    'url_main'=> $product->media['url_main'],
                    'url_additional'=> $images,
                    'folder'=> $product->media['folder'],
                ],
                'id'=>$request->query->all()['id'],
                'domain'=>$domain
            ];
        }else{
            $productData = [
                'name'=> $product['name'],
                'description'=> $product['description'],
                'stock'=> $product['stock'],
                'tax_status'=> $product['tax_status'],
                'price'=> $product['price'],
                'media'=> null,
                'id'=>$request->query->all()['id'],
                'domain'=>$domain
            ];
        }

        return view('inProductPage', [
            'productData'=>$productData
        ]);
    }

    public function category($name){
        $category = Category::where('name', $name)->first();
        if (!$category) {
            abort(404);
        }
        $categories = Category::where('visible', true)->get();
        $categories->each(function ($category) {
            unset($category->created_at);
            unset($category->updated_at);
            unset($category->visible);
        });

        return view('categoryPage', [
            'categories'=>$categories,
            'categoryName'=>$name
        ]);
    }
}
