<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api_controllers\UserController;
use App\Http\Controllers\api_controllers\SettingGoldRateController;
use App\Http\Controllers\api_controllers\GoldOnEmiScehemeController;
use App\Http\Controllers\api_controllers\UserGoldOnEmiScehemeController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post("logout", [UserController::class,'logout']);
});

Route::group(['prefix'=>'user'], function () {
    Route::get('/', [UserController::class,'index']);
    Route::post("login", [UserController::class,'login']);
    Route::post("register", [UserController::class,'register']);
});

Route::group(['prefix'=>'setting'], function () {
    Route::get('/get_gold_rate', [SettingGoldRateController::class,'get_gold_rate']);
    Route::post('/save_gold_rate', [SettingGoldRateController::class,'save_gold_rate']);
});

Route::group(['prefix'=>'gold_scheme'], function () {
    Route::get('/get_gold_on_emi_scheme', [GoldOnEmiScehemeController::class,'fetch']);
    Route::get('/get_user_gold_scheme', [UserGoldOnEmiScehemeController::class,'fetch']);
    Route::post('/save_user_gold_scheme', [UserGoldOnEmiScehemeController::class,'save']);
});

Route::group(['prefix'=>'buy_gold'], function () {
    Route::post('/emi_scheme_pay', [UserGoldOnEmiScehemeController::class,'save_user_emi_scheme']);
    Route::post('/direct_pay', [UserGoldOnEmiScehemeController::class,'user_gold_on_emi_dataset']);
});
