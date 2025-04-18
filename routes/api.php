<?php

use App\Modules\Auth\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::group([], base_path('app/Modules/Auth/routes.php'));
  Route::group([], base_path('app/Modules/Users/routes.php'));

});