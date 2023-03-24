<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ValidateException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Services\User\Tasks\LoginUserTask;
use App\Services\User\Tasks\RegisterUserTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerUser(RegisterUserRequest $request)
    {
        $credentials = $request->only([
            'name',
            'email',
            'password',
        ]);

        try {
            DB::beginTransaction();

            $data = resolve(RegisterUserTask::class)->handle($credentials);

            DB::commit();
            return response()->success($data);

        } catch (ModelNotFoundException $exception) {
            DB::rollBack();

            return response()->modelNotFound($exception);
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->exception($exception);
        }
    }

    public function loginUser(LoginUserRequest $request)
    {
        $credentials = $request->only([
            'email',
            'password',
        ]);

        try {

            $data = resolve(LoginUserTask::class)->handle($credentials);

            return response()->success($data);
        } catch (ValidateException $exception) {

            return response()->validation($exception);
        } catch (ModelNotFoundException $exception) {

            return response()->modelNotFound($exception);
        } catch (Exception $exception) {

            return response()->exception($exception);
        }
    }


    public function logout(Request $request)
    {
        $user = $request->user();

        $accessToken = $user->currentAccessToken();

        $accessToken->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout Successfully.',
        ]);
    }
}
