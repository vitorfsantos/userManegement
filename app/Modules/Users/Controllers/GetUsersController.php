<?php

namespace App\Modules\Users\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\Users\Services\GetUsersService;

class GetUsersController extends Controller
{

  private GetUsersService $getUsers;

  public function __construct(GetUsersService $getUsers)
  {
    $this->getUsers = $getUsers;
  }
  public function getAll()
  {
    return response($this->getUsers->get(), 200);
  }

}
