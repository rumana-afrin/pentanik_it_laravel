<?php

use App\Http\Controllers\Admin\AdvisoryController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\PackageCategoryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\BlogDetailsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

//admin route
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

    //user route
    Route::get('create-user',[UserController::class, 'create'])->name('create-user');
    Route::post('store-user',[UserController::class, 'store'])->name('store-user');
    Route::get('all-user',[UserController::class, 'index'])->name('all-user');
    Route::get('user-edit/{id}',[UserController::class, 'edit'])->name('user-edit');
    Route::put('user-update/{id}',[UserController::class, 'update'])->name('user-update');
    Route::delete('user-destroy/{id}',[UserController::class, 'destroy'])->name('user-destroy');

    //setting route
    Route::get('setting', [SettingController::class, 'createSetting'])->name('app-setting');
    Route::post('update-setting', [SettingController::class, 'updateSetting'])->name('update-setting');

    //digital service route
    Route::get('all-service-category', [ServiceCategoryController::class, 'index'])->name('all-service-category');
    Route::get('create-service-category', [ServiceCategoryController::class, 'create'])->name('create-service-category');
    Route::post('store-service-category', [ServiceCategoryController::class, 'store'])->name('store-service-category');
    Route::get('edit-service-category/{id}', [ServiceCategoryController::class, 'edit'])->name('edit-service-category');
    Route::put('update-service-category/{id}', [ServiceCategoryController::class, 'update'])->name('update-service-category');
    Route::delete('delete-service-category/{id}', [ServiceCategoryController::class, 'destroy'])->name('delete-service-category');

    //work process route
    Route::get('all-work-process', [WorkProcessController::class, 'index'])->name('all-work-process');
    Route::get('create-work-process', [WorkProcessController::class, 'create'])->name('create-work-process');
    Route::post('store-work-process', [WorkProcessController::class, 'store'])->name('store-work-process');
    Route::get('edit-work-process/{id}', [WorkProcessController::class, 'edit'])->name('edit-work-process');
    Route::put('update-work-process/{id}', [WorkProcessController::class, 'update'])->name('update-work-process');
    Route::delete('delete-work-process/{id}', [WorkProcessController::class, 'destroy'])->name('delete-work-process');
    
    //team route
    Route::get('all-team', [AdminTeamController::class, 'index'])->name('all-team');
    Route::get('create-team', [AdminTeamController::class, 'create'])->name('create-team');
    Route::post('store-team', [AdminTeamController::class, 'store'])->name('store-team');
    Route::get('edit-team/{id}', [AdminTeamController::class, 'edit'])->name('edit-team');
    Route::put('update-team/{id}', [AdminTeamController::class, 'update'])->name('update-team');
    Route::delete('delete-team/{id}', [AdminTeamController::class, 'destroy'])->name('delete-team');
   
    //blog route
    Route::get('all-blog', [AdminBlogController::class, 'index'])->name('all-blog');
    Route::get('create-blog', [AdminBlogController::class, 'create'])->name('create-blog');
    Route::post('store-blog', [AdminBlogController::class, 'store'])->name('store-blog');
    Route::get('edit-blog/{id}', [AdminBlogController::class, 'edit'])->name('edit-blog');
    Route::put('update-blog/{id}', [AdminBlogController::class, 'update'])->name('update-blog');
    Route::delete('delete-blog/{id}', [AdminBlogController::class, 'destroy'])->name('delete-blog');

    //portfolio-category route
    Route::get('all-portfolio-category', [PortfolioCategoryController::class, 'index'])->name('all-portfolio-category');
    Route::get('create-portfolio-category', [PortfolioCategoryController::class, 'create'])->name('create-portfolio-category');
    Route::post('store-portfolio-category', [PortfolioCategoryController::class, 'store'])->name('store-portfolio-category');
    Route::get('edit-portfolio-category/{id}', [PortfolioCategoryController::class, 'edit'])->name('edit-portfolio-category');
    Route::put('update-portfolio-category/{id}', [PortfolioCategoryController::class, 'update'])->name('update-portfolio-category');
    Route::delete('delete-portfolio-category/{id}', [PortfolioCategoryController::class, 'destroy'])->name('delete-portfolio-category');
    
    //portfolio route
    Route::get('all-portfolio', [AdminPortfolioController::class, 'index'])->name('all-portfolio');
    Route::get('create-portfolio', [AdminPortfolioController::class, 'create'])->name('create-portfolio');
    Route::post('store-portfolio', [AdminPortfolioController::class, 'store'])->name('store-portfolio');
    Route::get('edit-portfolio/{id}', [AdminPortfolioController::class, 'edit'])->name('edit-portfolio');
    Route::put('update-portfolio/{id}', [AdminPortfolioController::class, 'update'])->name('update-portfolio');
    Route::delete('delete-portfolio/{id}', [AdminPortfolioController::class, 'destroy'])->name('delete-portfolio');
    
    //page route
    Route::get('all-page', [PageController::class, 'index'])->name('all-page');
    Route::get('create-page', [PageController::class, 'create'])->name('create-page');
    Route::post('store-page', [PageController::class, 'store'])->name('store-page');
    Route::get('edit-page/{id}', [PageController::class, 'edit'])->name('edit-page');
    Route::put('update-page/{id}', [PageController::class, 'update'])->name('update-page');
    Route::delete('delete-page/{id}', [PageController::class, 'destroy'])->name('delete-page');

    //page advisory
    Route::get('all-advisory', [AdvisoryController::class, 'index'])->name('all-advisory');
    Route::get('create-advisory', [AdvisoryController::class, 'create'])->name('create-advisory');
    Route::post('store-advisory', [AdvisoryController::class, 'store'])->name('store-advisory');
    Route::get('edit-advisory/{id}', [AdvisoryController::class, 'edit'])->name('edit-advisory');
    Route::put('update-advisory/{id}', [AdvisoryController::class, 'update'])->name('update-advisory');
    Route::delete('delete-advisory/{id}', [AdvisoryController::class, 'destroy'])->name('delete-advisory');

    //page package category
    Route::get('all-package-category', [PackageCategoryController::class, 'index'])->name('all-package-category');
    Route::get('create-package-category', [PackageCategoryController::class, 'create'])->name('create-package-category');
    Route::post('store-package-category', [PackageCategoryController::class, 'store'])->name('store-package-category');
    Route::get('edit-package-category/{id}', [PackageCategoryController::class, 'edit'])->name('edit-package-category');
    Route::put('update-package-category/{id}', [PackageCategoryController::class, 'update'])->name('update-package-category');
    Route::delete('delete-package-category/{id}', [PackageCategoryController::class, 'destroy'])->name('delete-package-category');

    //page package
    Route::get('all-package', [PackageController::class, 'index'])->name('all-package');
    Route::get('create-package', [PackageController::class, 'create'])->name('create-package');
    Route::post('store-package', [PackageController::class, 'store'])->name('store-package');
    Route::get('edit-package/{id}', [PackageController::class, 'edit'])->name('edit-package');
    Route::put('update-package/{id}', [PackageController::class, 'update'])->name('update-package');
    Route::delete('delete-package/{id}', [PackageController::class, 'destroy'])->name('delete-package');
});

//website route
Route::get('/', [HomeController::class, 'home'])->name('home');
// Route::get('home/{slug}', [HeaderPageController::class, 'pages'])->name('header-page');
// Route::get('page/{slug}', [AditionalPageController::class, 'aditionalPage'])->name('aditional-page');
Route::get('blog-details/{slug}', [BlogDetailsController::class, 'blogDetails'])->name('blog-details');
// Route::get('portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
Route::get('/{slug}', [FrontendPageController::class, 'handle'])->name('dynamic-page');

// Route::get('about-us', [AboutUsController::class, 'aboutUs'])->name('about-us');
// Route::get('blog', [BlogController::class, 'blog'])->name('blog');
// Route::get('team', [TeamController::class, 'team'])->name('team');


// Route::get('/clear-all', function () {
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('route:clear');
//     Artisan::call('view:clear');

//     return redirect()->route('admin.dashboard')->with('success', 'Cache cleared successfully!');
// });