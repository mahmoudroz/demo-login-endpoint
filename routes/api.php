<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ChangeLanguage;
use App\Http\Controllers\Api\Auth\Login\LoginController;

Route::group(['middleware' => [ChangeLanguage::class]], function () {

    ################################ START AUTHENTICATION ###################################
    Route::group(['prefix' => 'auth', 'namespace' => 'Authentication'], function () {
        ######################## START LOGIN ########################
        Route::group(['prefix' => 'login', 'namespace' => 'Login'], function () {
            Route::post('', [LoginController::class, 'login'])->middleware('throttle:25,1');
        });
        ######################## END LOGIN ########################
    });
    ################################ END AUTHENTICATION ###################################
});
