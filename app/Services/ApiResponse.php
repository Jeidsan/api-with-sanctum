<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function created($data) : JsonResponse
    {
        return response()->json(
            [ 'status_code' => 201, 'message' => 'created', 'data' => $data ],
            201
        );
    }

    public static function success($data) : JsonResponse
    {
        return response()->json(
            [ 'status_code' => 200, 'message' => 'success', 'data' => $data ],
            200
        );
    }

    public static function error($message) : JsonResponse
    {
        return response()->json(
            [ 'status_code' => 500, 'message' => $message ],
            500
        );
    }

    public static function notFound() : JsonResponse
    {
        return response()->json(
            [ 'status_code' => 404, 'message' => 'Not found' ],
            404
        );
    }

    public static function unauthorized() : JsonResponse
    {
        return response()->json(
            [ 'status_code' => 401, 'message' => 'Unauthorized' ],
            401
        );
    }
}
