<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ResponseService
{
    /**
     * respond success json
     *
     * @params data, message
     *
     * @return JsonResponse
     */
    public static function success($data = null, $message = 'Successful', $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * respond error json
     *
     * @params data, message
     *
     * @return JsonResponse
     */
    public static function error($message = 'Failed.', $status = 400): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $status);
    }
}
