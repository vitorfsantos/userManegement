<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\User;

class DeleteUserService
{
  private $userModel;
  public function __construct(User $userModel)
  {
    $this->userModel = $userModel;
  }
  public function delete($userId)
  {
    try {
      $user = $this->userModel::findOrFail($userId);
      $user->delete();
      return response('', 204);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
