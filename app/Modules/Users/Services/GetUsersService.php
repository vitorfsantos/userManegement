<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\User;

class GetUsersService
{
  private $userModel;
  public function __construct(User $userModel)
  {
    $this->userModel = $userModel;
  }
  public function get()
  {
    return $this->userModel::with('level')
      ->orderBy('name', 'asc')
      ->paginate(20);
  }
}
