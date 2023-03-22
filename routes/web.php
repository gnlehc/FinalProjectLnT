<?php

use App\Http\Controllers\SessionCtrl;
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
Route::get('/register', [SessionCtrl::class, 'indexRegist']);
Route::post('/create', [SessionCtrl::class, 'create']);
Route::get('/login', [SessionCtrl::class, 'indexLogin']);
Route::get('/logout', [SessionCtrl::class, 'logout'])->name('logout');


Route::get('/dashboard', [SessionCtrl::class, 'dashboard'])->middleware('isAdmin');
Route::post('/dashboard', [SessionCtrl::class, 'login'])->middleware('isAdmin');
Route::get('/dashboard', [SessionCtrl::class, 'showData'])->middleware('isAdmin'); // show database data
Route::get('/editData/{id}', [SessionCtrl::class, 'edit'])->name('editData')->middleware('isAdmin');
Route::delete('/delete/{id}', [SessionCtrl::class, 'delete'])->name('delete')->middleware('isAdmin');
Route::patch('/updateData/{id}', [SessionCtrl::class, 'update'])->name('update')->middleware('isAdmin');

Route::get('/user', [SessionCtrl::class, 'indexUser']);
Route::post('/user', [SessionCtrl::class, 'login']);