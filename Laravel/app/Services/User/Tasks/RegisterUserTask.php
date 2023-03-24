<?php

namespace App\Services\User\Tasks;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserTask
{
    protected $model;

    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }
    public function handle($credentials)
    {
        $credentials['password'] = Hash::make($credentials['password']);

        $user = $this->model->create($credentials) ?:
        throw new ModelNotFoundException('Model User Not Found!');

        $data = [
            'status' => true,
            'message' => 'User Created Successfully',
            'data' => $user,
        ];

        return $data;
    }
}

