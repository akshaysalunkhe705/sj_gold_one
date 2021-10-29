<?php

use App\Http\Controllers\admin_controllers\StudentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\admin_controllers\{
    // DashboardController,
    UserController,
    GoldOnEmiSchemeController,
    PaymentController,
    SettingGoldRateController,
    UserGoldOnEmiSchemeController,
    VaultTransactionController,
};

//ADMIN
//Route::get('/', [DashboardController::class, 'dashboard'])->middleware('AuthCheck');
Route::get('/', [LoginController::class,'index']);
Route::match(['GET','POST'],'admin_signin', [LoginController::class,'admin_signin']);


//USER
Route::group(['prefix'=>'user'],function(){
	Route::get('/', [UserController::class,'index']);
	Route::get('detail', [UserController::class,'detail']);
	Route::match(['GET','POST'],'create', [UserController::class,'create']);
	Route::match(['GET','POST'],'edit/{id}', [UserController::class,'edit']);
	Route::get('delete/{id}/{type?}', [UserController::class,'delete']);
});
//SETTING GOLD RATE
Route::group(['prefix'=>'setting_gold_rate'],function(){
	Route::get('/', [SettingGoldRateController::class,'index']);
	Route::get('detail', [SettingGoldRateController::class,'detail']);
	Route::match(['GET','POST'],'create', [SettingGoldRateController::class,'create']);
	Route::match(['GET','POST'],'edit/{id}', [SettingGoldRateController::class,'edit']);
	Route::get('delete/{id}/{type?}', [SettingGoldRateController::class,'delete']);
});
//GOLD ON EMI SCHEME
Route::group(['prefix'=>'gold_on_emi_scheme'],function(){
	Route::get('/', [GoldOnEmiSchemeController::class,'index']);
	Route::get('detail', [GoldOnEmiSchemeController::class,'detail']);
	Route::match(['GET','POST'],'create', [GoldOnEmiSchemeController::class,'create']);
	Route::match(['GET','POST'],'edit/{id}', [GoldOnEmiSchemeController::class,'edit']);
	Route::get('delete/{id}/{type?}', [GoldOnEmiSchemeController::class,'delete']);
});
//PAYMENT
Route::group(['prefix'=>'payment'],function(){
	Route::get('/', [PaymentController::class,'index']);
	Route::get('detail', [PaymentController::class,'detail']);
	Route::match(['GET','POST'],'create', [PaymentController::class,'create']);
	Route::match(['GET','POST'],'edit/{id}', [PaymentController::class,'edit']);
	Route::get('delete/{id}/{type?}', [PaymentController::class,'delete']);
});
//USER GOLD ON EMI SCHEME
Route::group(['prefix'=>'user_gold_on_emi_scheme'],function(){
	Route::get('/', [UserGoldOnEmiSchemeController::class,'index']);
	Route::get('detail', [UserGoldOnEmiSchemeController::class,'detail']);
	Route::match(['GET','POST'],'create', [UserGoldOnEmiSchemeController::class,'create']);
	Route::match(['GET','POST'],'edit/{id}', [UserGoldOnEmiSchemeController::class,'edit']);
	Route::get('delete/{id}/{type?}', [UserGoldOnEmiSchemeController::class,'delete']);
});
//VAULT TRANSACTION
Route::group(['prefix'=>'vault_transaction'],function(){
	Route::get('/', [VaultTransactionController::class,'index']);
	Route::get('detail', [VaultTransactionController::class,'detail']);
	Route::match(['GET','POST'],'create', [VaultTransactionController::class,'create']);
	Route::match(['GET','POST'],'edit/{id}', [VaultTransactionController::class,'edit']);
	Route::get('delete/{id}/{type?}', [VaultTransactionController::class,'delete']);
});

// Route::fallback(function () {
//     return view('other_views.404');
// });
