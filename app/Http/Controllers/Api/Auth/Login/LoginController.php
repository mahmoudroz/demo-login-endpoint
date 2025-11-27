<?php

namespace App\Http\Controllers\Api\Auth\Login;

use stdClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Api\Auth\Login\LoginRequest;
use App\Interfaces\Login\LoginInterface;
use App\Traits\HandleApiJsonResponse\HandleApiJsonResponseTrait;

class LoginController extends Controller
{
    use HandleApiJsonResponseTrait;

    protected $loginService;
    public function __construct(LoginInterface $loginService)
    {
        $this->loginService = $loginService;
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = $this->loginService->login($credentials)) {
           return $this-> error(__('api.Information Error'));
        }

        return $this->success(
            UserResource::make(auth('api')->user(), $token)
        );
    }
}
