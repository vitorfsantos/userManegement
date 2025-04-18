<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\User;
use Illuminate\Routing\Controller;
use App\Modules\Users\Services\DeleteUserService;

class DeleteUsersController extends Controller {

  private DeleteUserService $deleteUser;

  public function __construct( DeleteUserService $deleteUser ){
    $this->deleteUser = $deleteUser;
  }
  public function delete(User $user){

    $response = $this->deleteUser->delete($user);

    return response(json_decode($response->getContent(), true), $response->getStatusCode());
  }


}


