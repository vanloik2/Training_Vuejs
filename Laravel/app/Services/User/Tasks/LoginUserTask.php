<?php

namespace App\Services\User\Tasks;

use App\Exceptions\ValidateException;
use Illuminate\Support\Facades\Auth;

class LoginUserTask
{
    public function handle($credentials)
    {
        if(!Auth::attempt($credentials, true)) {
            throw new ValidateException('Email & Password does not match with our record.');
        }

        $data = [
            'status' => true,
            'message' => 'Login User Successfully.',
            'data' => Auth::id(),
            'token' => Auth::user()->createToken('Bearer')->plainTextToken,
        ];

        return $data;
    }
}

