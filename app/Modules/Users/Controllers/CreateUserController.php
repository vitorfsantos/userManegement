<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Requests\CreateUserRequest;
use Illuminate\Routing\Controller;
use App\Modules\Users\Services\CreateUserService;

class CreateUserController extends Controller
{

  private CreateUserService $user;

  public function __construct( CreateUserService $user)
  {
    $this->user = $user;
  }
  public function create(CreateUserRequest $request){
    
    $response = $this->user->create($request->validated());
    return response(json_decode($response->getContent(), true), $response->getStatusCode());
  }
}
