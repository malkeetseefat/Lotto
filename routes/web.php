<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\BankdetailsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WinningController;
use App\Http\Controllers\FirebaseSettingsController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\Product;
use App\Models\ipadrress;


Route::get('/', function () {
    $clientIP = $_SERVER['REMOTE_ADDR'];
    $query = new ipadrress;
    $query->IP = $clientIP;
    $query->save();
    $date = date('Y-m-d');
    $products = Product::where('end_date', '>=', $date)->get();

    $status = order::where('status','1')->get();
    $getproid = order::where('status','1')->first();
    if(!empty($getproid)){
        $getproid = $getproid->product_id;
    }
    $checkproduct = Product::where('id',$getproid)->get();
    return view('products', compact('products', 'status', 'checkproduct'));
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('shopping', [ContactController::class, 'products'])->name('contact.us.products');
Route::any('how-to-bid', [ContactController::class, 'howtoplay'])->name('contact.us.howtoplay');
Route::any('winners', [ContactController::class, 'winners'])->name('contact.us.winners');
Route::any('privacy-policy', [ContactController::class, 'policy'])->name('contact.us.policy');
Route::any('terms-conditions', [ContactController::class, 'terms'])->name('contact.us.terms');
Route::any('contact', [ContactController::class, 'index'])->name('contact.us.index');
Route::any('contact-us', [ContactController::class, 'store'])->name('contact.us.store');
Route::get('cart', [ProductsController::class, 'cart']);
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart']);
Route::patch('update-cart', [ProductsController::class, 'update']);
Route::delete('remove-from-cart', [ProductsController::class, 'remove']);
Route::get('add-products', [ProductsController::class, 'addpro']);
Route::post('add-product', [ProductsController::class, 'addproduct']);
Route::get('products', [ProductsController::class, 'viewpro']);
Route::get('orders', [ProductsController::class, 'vieworder']);
Route::any('delete/{id}', [ProductsController::class, 'delete']);
Route::any('delete-order/{id}', [ProductsController::class, 'deleteorder']);
Route::get('edit/{id}', [ProductsController::class, 'edit']);
Route::post('edit-product', [ProductsController::class, 'edit_post']);
Route::get('razorpay-payment', [ProductsController::class, 'r_payment']);
Route::post('payment', [ProductsController::class,'payment'])->name('payment');
Route::get('profile', [ProductsController::class, 'user_profile']);
// Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');
Route::any('registers/{id}', [RegisterController::class, 'sponser_id']);
Route::get('a-pxz/{total}', [ProductsController::class, 'buy_now']);
Route::post('order', [ProductsController::class, 'create_order']);
Route::get('order', [ProductsController::class, 'error_solve']);
Route::get('about-us', [RegisterController::class, 'about']);
Route::get('product-category/{data}', [ProductsController::class, 'category']);
Route::get('search', [ProductsController::class, 'search']);
Route::get('search-order', [ProductsController::class, 'search_order']);
Route::get('order-details', [ProductsController::class, 'order_details']);
Route::get('product/{id}', [ProductsController::class, 'product_check']);
Route::get('users-details', [ProductsController::class, 'all_users']);
Route::get('team', [ProductsController::class, 'team']);


//language test
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


//password reset
Route::get('change-password', [ChangePassword::class,'index']);
Route::post('/change/password', [ChangePassword::class,'changePassword'])->name('profile.change.password');


//add bank details
Route::get('bank-details', [BankdetailsController::class,'index']);
Route::post('bank-detail', [BankdetailsController::class,'create']);
Route::get('bank-detail', [BankdetailsController::class,'create_first']);
Route::get('bank-status', [BankdetailsController::class,'get_bankdetails']);
Route::get('update-bank/{id}', [BankdetailsController::class,'edit']);
Route::get('changeStatus', [ProductsController::class,'changeStatus']);


//Winning Process
Route::post('winning-product', [WinningController::class, 'create']);
Route::post('winning-detail', [WinningController::class, 'store']);
Route::get('winning-status', [WinningController::class, 'show']);
Route::get('winning-user', [WinningController::class, 'winning_user']);
Route::post('/update-winner', [ProductsController::class,'update_winner']);

//Firebase-Settings
Route::post('firebase-settings', [FirebaseSettingsController::class, 'create']);
Route::get('firebase-collection', [FirebaseSettingsController::class, 'show']);
Route::get('changefirebaseStatus', [FirebaseSettingsController::class,'changeStatus']);

//Twillo
Route::get('/verify', function () {
    return view('admin.twilloverify');
})->name('verify');
Route::any('/phone', [FirebaseSettingsController::class,'sms']);
Route::get('/sendverify', [FirebaseSettingsController::class,'sendverify'])->name('sendverify');
Route::post('/verifyotp', [FirebaseSettingsController::class,'verify'])->name('verifyotp');
Route::get('verificationprocess', [FirebaseSettingsController::class,'verificationprocess']);
