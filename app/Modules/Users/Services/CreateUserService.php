<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\User;
use Illuminate\Support\Facades\DB;

class CreateUserService
{
  private $userModel;
  public function __construct(User $userModel)
  {
    $this->userModel = $userModel;
  }
  public function create($request)
  {
    try {
      DB::beginTransaction();
      unset($request['password_confirmation']);
      $user = $this->userModel::create($request);

      DB::commit();
      return response($user, 201);
    } catch (\Throwable $th) {
      DB::rollBack();
      throw $th;
    }
  }
}
