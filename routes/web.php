<?php

use App\Http\Controllers\CartCtrl;
use App\Http\Controllers\HomeCtrl;
use App\Http\Controllers\productCtrl;
use App\Http\Controllers\SessionCtrl;
use App\Models\Cart;
use App\Models\products;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SessionCtrl::class, 'home']);
// Route::get('/register', [SessionCtrl::class, 'indexRegist']);
Route::post('/create', [SessionCtrl::class, 'create']);
// Route::get('/login', [SessionCtrl::class, 'indexLogin']);
Route::get('/logout', [SessionCtrl::class, 'logout'])->name('logout');


Route::get('/dashboard', [SessionCtrl::class, 'dashboard'])->middleware('isAdmin');
Route::post('/dashboard', [SessionCtrl::class, 'login'])->middleware('isAdmin');
Route::get('/dashboard', [SessionCtrl::class, 'showData'])->middleware('isAdmin'); // show database data
Route::get('/editData/{id}', [SessionCtrl::class, 'edit'])->name('editData')->middleware('isAdmin');
Route::delete('/delete/{id}', [SessionCtrl::class, 'delete'])->name('delete')->middleware('isAdmin');
Route::patch('/updateData/{id}', [SessionCtrl::class, 'update'])->name('update')->middleware('isAdmin');

Route::get('/user', [SessionCtrl::class, 'indexUser']);
Route::post('/user', [SessionCtrl::class, 'login']);

Route::get('/user', function () {
    $user = Auth::user();
    return view('user', compact('user'));
});

Route::get('/account', [SessionCtrl::class, 'dual'])->middleware('isLogin');

Route::get('/createCategory', [productCtrl::class, 'indexCategory'])->middleware('isAdmin');
Route::post('/store-category', [productCtrl::class, 'storeCategory']);
Route::get('/createProduct', [productCtrl::class, 'indexProd']);
Route::post('store-product', [productCtrl::class, 'storeProduct']);
Route::get('/createProduct', [productCtrl::class, 'showCategory'])->name('categories')->middleware('isAdmin');
Route::get('/displayProduct', [productCtrl::class, 'showProducts']);
Route::get('/editProd/{id}', [productCtrl::class, 'editProd'])->name('editProd')->middleware('isAdmin');
Route::delete('/deleteProd/{id}', [productCtrl::class, 'deleteProd'])->name('deleteProd')->middleware('isAdmin');
Route::patch('/updateProd/{id}', [productCtrl::class, 'updateProd'])->name('updateProd')->middleware('isAdmin');

// User UI
// Route::get('/Products', [productCtrl::class, 'userProducts']);


Route::post('/addcart/{id}', [CartCtrl::class, 'addcart']);
Route::get('/Products', function () {
    $user = Auth::user();
    $products = products::all();
    $count = Cart::where('user_id', $user->id)->count();
    return view('Product', compact('user', 'count', 'products'));
});

Route::get('/Cart', [CartCtrl::class, 'showCart']);

// Route::get('/Cart', function () {
//     $user = Auth::user();
//     $products = products::all();
//     $cart = Cart::where('user_id', $user->id);
//     $count = Cart::where('user_id', $user->id)->count();
//     return view('Cart', compact('user', 'count', 'products', 'cart'));
// });

Route::get('/delete/{id}', [CartCtrl::class, 'deleteCart']);
