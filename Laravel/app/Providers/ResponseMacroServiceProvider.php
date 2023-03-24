<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        response()->macro('success', function($data, $code = 200, $status = true) {
            return response()->json([
                'status' => $status,
                'message' => $data['message'] ?: '',
                'data' => $data['data'] ?: '',
                'token' => !empty($data['token']) ? $data['token'] : '',
                'statusCode' => $code,
            ], $code);
        });

        response()->macro('modelNotFound', function($exception, $code = 404, $status = false) {
            return response()->json([
                'status' => $status,
                'message' => $exception->getMessage(),
                'statusCode' => $code,
            ], $code);
        });

        response()->macro('validation', function($exception, $code = 400, $status = false) {
            return response()->json([
                'status' => $status,
                'message' => $exception->getMessage(),
                'statusCode' => $code,
            ], $code);
        });

        response()->macro('exception', function($exception, $code = 500, $status = false) {
            return response()->json([
                'status' => $status,
                'message' => $exception->getMessage(),
                'statusCode' => $code,
            ], $code);
        });
    }
}
