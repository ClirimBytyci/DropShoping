<?php

use App\Http\Controllers\checkOutProduct;
use App\Http\Controllers\CreateProduct;
use App\Http\Controllers\EditProfileClient;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Models\Cart;
use App\Models\Media;
use App\Models\Orders;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProductPageController;

//use App\Http\Controllers\RcoveryPasswordAdminController;
use Ramsey\Uuid\Uuid;


Auth::routes();

Route::get('/home', function () {
    return view('productPage');
})->middleware(Authenticate::class);
Route::get('admin/dashboard', [adminController::class, 'dashboard'])->name('admin.dashboard')->middleware(
    Authenticate::class
);

Route::get('admin/password', [adminController::class, 'password'])->name('admin.password')->middleware(
    Authenticate::class
);
Route::get('admin/analytics', [adminController::class, 'analytics'])->name('admin.analytics')->middleware(
    Authenticate::class
);
Route::get('admin/orders', [adminController::class, 'orders'])->name('admin.orders')->middleware(Authenticate::class);
Route::get('admin/users', [adminController::class, 'users'])->name('admin.users')->middleware(Authenticate::class);
Route::get('admin/sales', [adminController::class, 'sales'])->name('admin.sales')->middleware(Authenticate::class);




Route::post('/api/cart', [checkOutProduct::class, 'addToCart'])->name('products.frontend');
Route::get('/product/page', [ProductPageController::class, 'productPage'])->name('product.page');
Route::get('/api/products', [ProductPageController::class, 'productData']);

Route::get('/product/{productTitle}/{productNumber}', [ProductPageController::class,'insideProductPage']);

Route::delete('/api/delete/{lineItemId}', [checkOutProduct::class, 'deleteFromCart']);
Route::get('/edit/profile/{name}', [EditProfileClient::class,'profileClient'])->middleware(Authenticate::class);
Route::post('/edit/profile/{id}', [EditProfileClient::class,'editProfile']);


Route::get('/create/product', [CreateProduct::class,'viewProduct']);
Route::post('/create/product/test', [CreateProduct::class,'createProduct'])->name('create.product');


//Route::post('admin/recovery/password', [RcoveryPasswordAdminController::class, 'recoveryPassword'])->name('admin.recovery.password')->middleware(Authenticate::class);

Route::get('/example', function () {
    return view('example');
})->middleware(Authenticate::class);

Route::post('/api/save-data', function (Request $request) {
    $validatedData = $request->validate([
        'currentPassword' => 'required|min:8',
        'newPassword1' => 'required|min:8',
        'newPassword2' => 'required|min:8',
    ]);

    $user = User::find(auth()->user()['id']);

    try {
        Hash::check(
            $validatedData['currentPassword'],
            auth()->user()['password']
        ) && $validatedData['newPassword1'] === $validatedData['newPassword2'];
        $user->password = Hash::make($validatedData['newPassword1']);
        $user->save();

        return response()->json([
            'message' => 'Success, you changed your password.',
        ]);
    } catch (Exception $e) {
        return $e;
    }
})->middleware(Authenticate::class);

Route::post('/test', function (Request $request){
    $hashedId = $request->request->all()['id'];
    dd(Crypt::decryptString($hashedId));
    $product = Product::where('id', Crypt::decryptString($hashedId))->first();
    dd($product);
});



