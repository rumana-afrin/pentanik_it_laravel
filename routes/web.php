<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\AditionalPageController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\BlogDetailsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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


Route::get('login', [LoginController::class, 'create'])->name('login.create');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

    //user 
    Route::get('create-user',[UserController::class, 'create'])->name('create-user');
    Route::post('store-user',[UserController::class, 'store'])->name('store-user');
    Route::get('all-user',[UserController::class, 'index'])->name('all-user');
    Route::get('user-edit/{id}',[UserController::class, 'edit'])->name('user-edit');
    Route::put('user-update/{id}',[UserController::class, 'update'])->name('user-update');
    Route::delete('user-destroy/{id}',[UserController::class, 'destroy'])->name('user-destroy');
});
// Route::get('/', function(){
//     return view('auth.register');
// });

//website route
Route::get('/', [HomeController::class, 'home']);
Route::get('about-us', [AboutUsController::class, 'aboutUs'])->name('about-us');
Route::get('page', [AditionalPageController::class, 'aditionalPage'])->name('aditional-page');
Route::get('blog', [BlogController::class, 'blog'])->name('blog');
Route::get('blog-details', [BlogDetailsController::class, 'blogDetails'])->name('blog-details');
Route::get('portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
Route::get('team', [TeamController::class, 'team'])->name('team');



Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return redirect()->route('admin.dashboard')->with('success', 'Cache cleared successfully!');
});