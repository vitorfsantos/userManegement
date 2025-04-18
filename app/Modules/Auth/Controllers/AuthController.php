<?php

namespace App\Modules\Auth\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Auth\Requests\AuthRequest;
use Illuminate\Http\Request;

use App\Modules\Users\Models\User;
use App\Modules\Users\Models\UserLevel;

class AuthController extends Controller
{
  public function login(AuthRequest $request)
  {
    $credentials = $request->validated();
    if (!Auth::attempt($credentials)) {
      return response(['message' => 'Credenciais inválidas'], 401);
    }

    $user = auth()->user();
    $level = UserLevel::find($user['user_level_id']);

    $token = $user->createToken('auth', [$level->slug]);
    return [
      'token' => $token->plainTextToken,
      'user' => $user
    ];
  }

  public function logout(Request $request)
  {
    $request->user()->tokens()->delete();

    return response([], 204);
  }
}
