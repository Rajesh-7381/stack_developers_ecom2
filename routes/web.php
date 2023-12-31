<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // notify()->success('Welcome to Laravel Notify ⚡️');
    return view('welcome');
});

Route::prefix('/admin')->group(function () {
    Route::match(['get', 'post'], '/login', [MainController::class, 'login'])->name('login');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [MainController::class, 'dashboard']);
        Route::match(['get', 'post'],'/updatepassword', [MainController::class, 'updatepassword']);
        Route::match(['get', 'post'],'/updateadmindetails', [MainController::class, 'updateAdminDetails']);
        Route::post('/checkcurrentpassword', [MainController::class, 'checkcurrentpassword']);
        Route::get('/logout',[MainController::class,'logout']);

        // cms page
        Route::get('cms-page',[CmsController::class,'index']);
        Route::post('update-status-cms-page',[CmsController::class,'update']);
        Route::match(['get','post'],'add-edit-cms-page/{id?}',[CmsController::class,'edit'])->name('admin.add-edit-cms-page');
        Route::get('delete-cms-page/{id?}',[CmsController::class,'destroy']);

        // subadmins
        Route::get('sub-admins',[MainController::class,'sub_admins']);
        // Route::post('update-subadmin-status',[MainController::class,'updatesubadminstatus']);
        Route::post('update-status-subadmin-page',[MainController::class,'updatesubadminstatus']);
        Route::match(['get','post'],'add-edit-subadmins-page/{id?}',[MainController::class,'addupdatesubadminDetails']);
        Route::match(['get','post'],'update-role/{id?}',[MainController::class,'UpdateRole']);
        Route::get('delete-subadmin-page/{id?}',[MainController::class,'deletesubadmins']);

        // categories
        Route::get('categories',[CategoryController::class,'categories']);
        Route::post('update-status-category-page',[CategoryController::class,'updatecategorystatus']);
        // Route::post('update-category-status',[CategoryController::class,'updatecategorystatus']);
        Route::match(['get','post'],'add-edit-category-page/{id?}',[CategoryController::class,'addedit'])->name('admin.add-edit-category-page');
        // Route::match(['get','post'],'oop/{id?}',[CategoryController::class,'addedit']);

        Route::get('delete-category-page/{id?}',[CategoryController::class,'deletecategory']);
        // Route::get('delete-category-image/{id?}',[CategoryController::class,'deletecategoryimage']);


        // products
        Route::get('products',[ProductsController::class,'products']);
        Route::post('update-status-product-page',[ProductsController::class,'updateproductstatus']);
        Route::match(['get','post'],'add-edit-product-page/{id?}',[ProductsController::class,'addedit']);
        Route::get('delete-product-page/{id?}',[ProductsController::class,'deleteproduct']);

    });
});
 