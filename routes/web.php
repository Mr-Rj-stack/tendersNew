<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidController;



Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/tendercall', [HomeController::class, 'call'])->name('tendercall');
Route::post('/tenderpost/{id}', [TenderController::class, 'post_tender'])->name('tenderpost');

Route::get('/bid', [HomeController::class, 'bid'])->name('bid');
Route::get('/makebid/{id}', [HomeController::class, 'makebid'])->name('makebid');
Route::post('/bidpost/{id}', [BidController::class, 'post_bid'])->name('bidpost');


Route::get('/expert', [HomeController::class, 'expert'])->name('expertoption');

Route::get('/register', [RegisterController::class, 'register_form'])->name('register');
Route::post('/registerpost', [RegisterController::class, 'register'])->name('registerpost');

Route::get('/login', [LoginController::class, 'login_form'])->name('loginget');
Route::post('/loginpost', [LoginController::class, 'login'])->name('loginpost');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('admin', [LoginController::class, 'adminlogin'])->name('adminlogin');
Route::get('user', [LoginController::class, 'userlogin'])->name('userlogin');

Route::get('admin/alltenders', [AdminController::class, 'all_tenders'])->name('all_tenders');
Route::get('admin/biddetails', [AdminController::class, 'bid_details'])->name('bid_details');
Route::get('admin/userdetails', [AdminController::class, 'user_details'])->name('user_details');
Route::get('admin/adminprofile', [AdminController::class, 'admin_profile'])->name('admin_profile');

Route::get('user/usertenders', [UserController::class, 'user_tenders'])->name('user_tenders');
Route::get('user/userbids/{id}', [UserController::class, 'user_bids'])->name('user_bids');
Route::get('user/viewbids', [UserController::class, 'view_bids'])->name('view_bids');














