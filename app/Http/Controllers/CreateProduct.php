<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class CreateProduct extends Controller
{
    public function viewProduct(){
        $categories = Category::all();
        $categories->each(function ($category) {
            unset($category->created_at);
            unset($category->updated_at);
            unset($category->visible);
        });
        return view('createProduct', ['categories'=> $categories, 'domain' => config('app.url')]);
    }
    public function createProduct(Request $request){
        $request->validate([
            'additionalPhotos' => 'array|max:4',
        ]);

        $folder = 'images/product/';
        $data = $request->all();
        $imageName = time().'.'.$request->file('mainPhoto')->getClientOriginalName();
        $request->mainPhoto->move(public_path($folder), $imageName);

        $additionalPhoto = array();
        foreach ($request->file('additionalPhotos') as $photo){
            $additionalPhoto[] = time().'.'.$photo->getClientOriginalName();
            $photo->move(public_path($folder), time().'.'.$photo->getClientOriginalName());
        }
        $active = 0;
        if (isset($data['active']) && $data['active'] == 'on' ){
            $active = 1;
        }
        $product = Product::create([
            'name'=> $data['name'],
            'product_number' =>$data['product-number'],
            'category_id' => $data['category'],
            'description' => $data['description'],
            'stock'=> $data['stock'],
            'active'=> $active,
            'tax_status'=>$data['tax'],
            'product_media_id'=>Uuid::uuid4(),
            'price'=> $data['price'],
        ]);

        Media::create([
            'product_id'=> $product->id,
            'folder'=> $folder,
            'url_main' => $imageName,
            'url_additional' => json_encode($additionalPhoto),
        ]);
        return back();
    }
}
