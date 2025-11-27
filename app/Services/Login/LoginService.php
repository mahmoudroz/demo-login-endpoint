<?php

namespace App\Services\Login;

use App\Interfaces\Login\LoginInterface;

class LoginService implements LoginInterface
{
    public function login(array $credentials)
    {
        if (!$token = auth('api')->attempt($credentials)) {
            return null;
        }

        return $token;
    }
}
