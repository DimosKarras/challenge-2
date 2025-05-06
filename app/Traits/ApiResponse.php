<?php

namespace App\Traits;

trait ApiResponse
{
    protected function successResponse($data = null, $code = 200)
    {
        return response()->json([
            'success' => true,
            'data'    => $data,
        ], $code);
    }


    protected function errorResponse($message = null, $errors = [], $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }
}
