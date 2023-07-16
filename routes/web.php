<?php
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
 use App\Models\Meal;
use App\Http\Controllers;
  /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/",[\App\Http\Controllers\HomeController::class,'index'])->name('home');

 
Route::get('/add-to-cart/{id}',['uses'=>'App\Http\Controllers\ProductController@getAddToCart','as'=>'Product.addToCart']);
Route::get('/shopping-cart/{id}',['uses'=>'App\Http\Controllers\ProductController@getCart','as'=>'Product.shoppingCart']);
Route::get('/myCart',['uses'=>'App\Http\Controllers\ProductController@MyCart','as'=>'Product.MyCart']);
Route::get('/myCart-del/{id}',['uses'=>'App\Http\Controllers\ProductController@product_del','as'=>'product.del']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 

Route::group(['prefix'=>'menu' ],function(){
    Route::get('/',['uses'=>'App\Http\Controllers\menuController@showMeal','as'=>'Meals.Get']);
//    Route::get('/','App\Http\Controllers\menuController@showMeal');
});

Route::get('/history/{id}', ['App\Http\Controllers\historyController', 'getOrders'])->name(
    'history'
);

Route::patch('{id}/feedback', ['App\Http\Controllers\historyController', 'feedback']);
Route::get('stripe',[StripePaymentController::class , 'stripe']);
Route::post('stripe',[StripePaymentController::class , 'stripepost'])->name('stripe.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/' , [\App\Http\Controllers\Admin\AdminController::class , 'index'])->name('index');
    Route::get('/details' , [\App\Http\Controllers\Admin\AdminController::class , 'edit_contacts_info'])->name('details');
    Route::get('/about' , [\App\Http\Controllers\Admin\AdminController::class , 'edit_about'])->name('about');
    Route::get('/details/edit/{id}' , [\App\Http\Controllers\Admin\AdminController::class , 'update'])->name('update_details');
    Route::put('update-data/{id}' ,  [\App\Http\Controllers\Admin\AdminController::class , 'edit']);
    Route::get('/about/edit/{id}' , [\App\Http\Controllers\Admin\AdminController::class , 'update_about'])->name('update_about');
    Route::put('update-about/{id}' ,  [\App\Http\Controllers\Admin\AdminController::class , 'about']);
    Route::get('/alluser',[\App\Http\Controllers\Admin\AdminController::class, 'allusers' ])->name('allusers');
    Route::get('suspend/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'suspend' ]);
    Route::get ('/orders',[\App\Http\Controllers\Admin\AdminController::class,'getOrders']);
    Route::get('menu/create','App\Http\Controllers\menuController@create');
    Route::post('menu/store','App\Http\Controllers\menuController@store');
    Route::get('menu/addType','App\Http\Controllers\menuController@addType');
    Route::post('menu/storeType','App\Http\Controllers\menuController@storeType');
    Route::get('menu/{meal:id}/edit','App\Http\Controllers\menuController@edit');
    Route::patch('menu/{meal:id}/update','App\Http\Controllers\menuController@update');
    Route::get('menu/{meal:id}/delete','App\Http\Controllers\menuController@delete');
    Route::delete('menu/{meal:id}/destroy', 'App\Http\Controllers\menuController@destroy');
    Route::get('menu/{type:id}/deleteType','App\Http\Controllers\menuController@deleteType');
    Route::delete('menu/{type:id}/destroyType', 'App\Http\Controllers\menuController@destroyType');
    Route::get('menu/{id?}','App\Http\Controllers\menuController@showMealAdmin');

 });
 Route::group(['prefix'=>'menu' ],function(){
    Route::get('/',['uses'=>'App\Http\Controllers\menuController@showMeal','as'=>'Meals.Get']);
    Route::get('/{id?}','App\Http\Controllers\menuController@showMeal');
});

Route::get('/history/{id}', ['App\Http\Controllers\historyController', 'getOrders'])->name(
    'history'
);
Route::patch('{id}/feedback', ['App\Http\Controllers\historyController', 'feedback'])->name(
    'feedback'
);
Route::get('/make-order/{id}',['uses'=>'App\Http\Controllers\OrderController@sendOrder','as'=>'Order.send']);
Route::get('/end-order/{id}',['uses'=>'App\Http\Controllers\OrderController@orderDone','as'=>'end']);
Route::get('admin/order-details/{id}',['uses'=>'App\Http\Controllers\OrderController@orderdelivery','as'=>'deliveryDetails']);

Route::get('/cart',function (){
    return view('Cart');
});
Route::get('/add-to-cart/{id}',['uses'=>'App\Http\Controllers\ProductController@getAddToCart','as'=>'Product.addToCart']);
Route::get('/shopping-cart/{id}',['uses'=>'App\Http\Controllers\ProductController@getCart','as'=>'Product.shoppingCart']);
Route::get('/myCart',['uses'=>'App\Http\Controllers\ProductController@MyCart','as'=>'Product.MyCart']);
Route::get('/myCart-del/{id}',['uses'=>'App\Http\Controllers\ProductController@product_del','as'=>'product.del']);
Route::get('/delivery-details', ['uses'=>'App\Http\Controllers\OrderController@details','as'=>'delivery']);
Route::get('/edit-delivery-details', ['uses'=>'App\Http\Controllers\OrderController@edit_delivery','as'=>'edit-delivery']);
Route::get('/delivary/edit/{id}' , ['uses'=>'App\Http\Controllers\OrderController@update','as'=>' update-delivery'] );
// Route::put('/update-delivery/{id}' ,   ['uses'=>'App\Http\Controllers\OrderController@edit','as'=>'edit'] );
Route::put('/update-delivery/{id}' ,  [\App\Http\Controllers\OrderController::class , 'edit']);


Route::get('/check-out', ['uses'=>'App\Http\Controllers\OrderController@checkout','as'=>'checkout']);
Route::post('store-form', ['uses'=>'App\Http\Controllers\OrderController@store','as'=>'submit']);

Route::get('stripe',[StripePaymentController::class , 'stripe']);
Route::post('stripe',[StripePaymentController::class , 'stripepost'])->name('stripe.post');


Route::resource('banks','BankController');

Route::get('banks/get_banks_by_year/{year}','BanksController@get_banks_by_year');


 Route::get('/profile',[\App\Http\Controllers\UserController::class,'viewProfile']);
 Route::get('/profile/edit',[\App\Http\Controllers\UserController::class,'editProfile']);
 Route::post('/profile/edit',[\App\Http\Controllers\UserController::class,'updateProfile']);

 



require __DIR__.'/auth.php';