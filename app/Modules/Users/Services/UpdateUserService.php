<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateUserService
{
  private $userModel;
  public function __construct(User $userModel)
  {
    $this->userModel = $userModel;
  }

  public function update($request, $userId)
  {
    try {
      DB::beginTransaction();
      $user = $this->userModel::findOrFail($userId);
      $user->update($request);
      DB::commit();
      return response($user, 200);
    } catch (\Throwable $th) {
      DB::rollBack();
      throw $th;
    }
  }

  public function updateMe($request)
  {
    try {
      DB::beginTransaction();
      $user = auth()->user();
      unset($request['password_confirmation']);
      $user->update($request);
      DB::commit();
      return response($user, 200);
    } catch (\Throwable $th) {
      DB::rollBack();
      throw $th;
    }
  }
}
