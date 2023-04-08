<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class CreateProduct extends Controller
{
    public function viewProduct(){
        return view('createProduct');
    }
    public function createProduct(Request $request){
        $data = $request->all();
        $imageName = time().'.'.$request->mainPhoto->extension();
        $request->mainPhoto->move(public_path('images/product'), $imageName);

        $additionalPhoto = array();
        foreach ($request->file('additional-photos') as $photo){
            $additionalPhoto[] = config('app.url').'/images/product/'.time().'.'.$photo->extension();
        }

        $active = 0;
        if (isset($data['active']) && $data['active'] == 'on' ){
            $active = 1;
        }
$productId = Uuid::uuid4()->toString();
        $product = Product::create([
            'id'=> Uuid::uuid4()->toString(),
            'name'=> $data['name'],
            'product_number' =>$data['product-number'],
            'description' => $data['description'],
            'stock'=> $data['stock'],
            'active'=> $active,
            'tax_status'=>$data['tax'],
            'product_media_id'=>Uuid::uuid4()->toString(),
            'price'=> $data['price'],
        ]);

        dd($product);

        Media::create([
            'id' => Uuid::uuid4()->toString(),
            'product_id'=> '0911af99-111d-4a8d-9982-f1ace258baa6',
            'user_id'=> null,
            'url_main' => config('app.url').'/images/product/'.$imageName,
            'url_additional' => json_encode($additionalPhoto),
        ]);
        return back();
    }

}
