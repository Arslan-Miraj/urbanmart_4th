<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\WarehousesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PaymentTypesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StaffMembersController;
use App\Http\Controllers\SellingOrdersController;
use App\Http\Controllers\PurchasingOrdersController;

Route::view('/', 'registration/signup')->name('signup');
Route::post('/registerSave', [UserController::class , 'register'])->name('registerSave');

Route::view('/login', 'registration/login')->name('login');
Route::post('/loginMatch', [UserController::class , 'login'])->name('loginMatch');

Route::get('/logout', [UserController::class , 'logout'])->name('logout');



    Route::resource('/customers', CustomersController::class);
    Route::resource('/products', ProductsController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/brands', BrandsController::class);
    Route::resource('/suppliers', SuppliersController::class);
    Route::resource('/cities', CitiesController::class);
    Route::resource('/areas', AreasController::class);

    Route::resource('/warehouse', WarehousesController::class);
    Route::post('/getarea', [WarehousesController::class, 'getarea'])->name('getarea');

    Route::resource('/inventory', InventoryController::class);
    Route::resource('/payment_types', PaymentTypesController::class);
    Route::resource('/roles', RolesController::class);
    Route::resource('/staff_members', StaffMembersController::class);
    Route::resource('/selling_orders', SellingOrdersController::class);
    Route::resource('/purchasing_orders', PurchasingOrdersController::class);

// Route::fallback(function(){
//     return view('page404.pages-404');
// });






