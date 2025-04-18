<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Requests\EditUserRequest;
use App\Modules\Users\Requests\EditMyselfRequest;
use Illuminate\Routing\Controller;
use App\Modules\Users\Services\UpdateUserService;

class UpdateUsersController extends Controller
{

  private UpdateUserService $update;

  public function __construct(UpdateUserService $update)
  {
    $this->update = $update;
  }


  public function update(EditUserRequest $request, $userId)
  {
    $response = $this->update->update($request->validated(), $userId);

    return response(json_decode($response->getContent(), true), $response->getStatusCode());
  }
  public function updateMyself(EditMyselfRequest $request)
  {
    $response = $this->update->updateMe($request->validated());

    return response(json_decode($response->getContent(), true), $response->getStatusCode());
  }
}
