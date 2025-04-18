<?php

use Illuminate\Support\Facades\Route;

use App\Modules\Users\Controllers\CreateUserController;
use App\Modules\Users\Controllers\GetUsersController;
use App\Modules\Users\Controllers\UpdateUsersController;
use App\Modules\Users\Services\DeleteUserService;

Route::group(['prefix' => 'users'], function(){
  Route::post('/', [CreateUserController::class, 'create'])->middleware(['ability:admin']);
  Route::put('/{userId}', [UpdateUsersController::class, 'update'])->middleware(['ability:admin']);
  Route::put('/update/me', [UpdateUsersController::class, 'updateMyself']);
  Route::get('/', [GetUsersController::class, 'getAll']);
  Route::delete('/{userId}', [DeleteUserService::class, 'delete'])->middleware(['ability:admin']);
});
