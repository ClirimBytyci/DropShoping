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


        $product = Product::create([
//            'id' => Uuid::uuid4(),
            'name'=> $data['name'],
            'product_number' =>$data['product-number'],
            'description' => $data['description'],
            'stock'=> $data['stock'],
            'active'=> $active,
            'tax_status'=>$data['tax'],
            'product_media_id'=>Uuid::uuid4(),
            'price'=> $data['price'],
        ]);

        Media::create([
//            'id' => Uuid::uuid4(),
            'product_id'=> $product->id,
            'user_id'=> null,
            'url_main' => config('app.url').'/images/product/'.$imageName,
            'url_additional' => json_encode($additionalPhoto),
        ]);

//        $product = new Product();
//        $product->id = Uuid::uuid4();
//        $product->name = $data['name'];
//        $product->product_number = $data['product-number'];
//        $product->description = $data['description'];
//        $product->stock = $data['stock'];
//        $product->active = $active;
//        $product->tax_status = $data['tax'];
//        $product->product_media_id = Uuid::uuid4();
//        $product->price = $data['price'];
//        $product->save();
//
//        $media = new Media();
//        $media->id = Uuid::uuid4();
//        $media->product_id = $product->id;
//        $media->url_main = config('app.url').'/images/product/'.$imageName;
//        $media->url_additional = json_encode($additionalPhoto);
//        $media->save();
        return back();
    }

}
