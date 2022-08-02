<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\gameController;
use App\Http\Controllers\cdController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\shopDetailController;
use App\Http\Controllers\bookdetailController;
use App\Http\Controllers\gamedetailController;
use App\Http\Controllers\cddetailController;
use App\Http\Controllers\cartController;
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

/*-----------------Admin route----------------------------*/
Route::prefix('admin')->group(function(){
    Route::get('/login',[adminController::class, 'index'])->name('login_form');
    Route::post('/login/owner',[adminController::class, 'login'])->name('admin_login');
    Route::get('/dashboard',[bookController::class, 'dashboard'])->name('admin_dashboard')->middleware('admin');
    Route::get('/logout',[adminController::class, 'adminLogout'])->name('admin.logout')->middleware('admin');
    Route::post('/register',[adminController::class, 'adminRegister'])->name('admin.register');
});

/*----------------- End Admin route----------------------------*/

/*-----------------------------Book---------------------------*/
Route::post('/dashboard', [bookController::class, 'storeBook'])->name('store.book');

Route::get('/book/edit/{id}', [bookController::class, 'edit']);
Route::post('/book/update/{id}', [bookController::class, 'update'])->name('update.book');

Route::get('/book/delete/{id}', [bookController::class, 'delete']);

/*----------------------------- End Book---------------------------*/


/*-----------------------------Games---------------------------*/
Route::get('/game',[gameController::class, 'gameIndex'])->name('game.index');

Route::post('/game/add', [gameController::class, 'storeGame'])->name('store.game');

Route::get('/game/edit/{id}', [gameController::class, 'edit']);
Route::post('/game/update/{id}', [gameController::class, 'update'])->name('update.game');

Route::get('/game/delete/{id}', [gameController::class, 'delete']);


/*----------------------------- End Games---------------------------*/




/*-----------------------------CDs---------------------------*/
Route::get('/cd',[cdController::class, 'cdIndex'])->name('cd.index');

Route::post('/cd/add', [cdController::class, 'storeCd'])->name('store.cd');

Route::get('/cd/edit/{id}', [cdController::class, 'edit']);
Route::post('/cd/update/{id}', [cdController::class, 'update'])->name('update.cd');

Route::get('/cd/delete/{id}', [cdController::class, 'delete']);

/*----------------------------- End CDs---------------------------*/



/*------------------------------Frontend------------------------*/
// Route::get('/cart', function () {
//     return view('cart');
// })->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');


// Route::get('/bookdetail', function () {
//     return view('bookdetail');
// })->name('bookdetail');

Route::get('/cart',[cartController::class, 'cart'])->name('cart');
Route::get('/cart/delete/{id}', [cartController::class, 'delete']);

Route::get('/bookdetail',[bookdetailController::class, 'bookdetail'])->name('bookdetail');
Route::post('/addtocart', [bookController::class, 'addtocart']);


// Route::get('/gamedetail', function () {
//     return view('gamedetail');
// })->name('gamedetail');
Route::get('/gamedetail',[gamedetailController::class, 'gamedetail'])->name('gamedetail');

// Route::get('/cddetail', function () {
//     return view('cddetail');
// })->name('cddetail');
Route::get('/cddetail',[cddetailController::class, 'cddetail'])->name('cddetail');

Route::get('/product.detail', function () {
    return view('product_detail');
})->name('product.detail');

Route::get('/product', function () {
    return view('product');
})->name('product');
/*------------------------------Home Page------------------------*/
// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

Route::get('/',[welcomeController::class, 'index'])->name('index');
Route::post('/subscribe',[welcomeController::class, 'subscribe'])->name('subscribe');
//Newsletter
// Route::post('/subscribe', ['welcomeController::class, 'subscribe'])->name('subscribe');


/*------------------------------SingleProductDetail------------------------*/
Route::get('/book/detail/{id}', [shopDetailController::class, 'bookDetail']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('/dashboard');
})->name('dashboard');


