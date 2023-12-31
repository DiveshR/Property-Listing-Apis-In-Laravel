<?php

namespace App\Traits;

trait HttpResponse
{

    protected function success($data, string $message = null, int $code = 200)
    {
        return response()->json([
            'status' => 'Request was Successful',
            'message' => $message,
            'data' => $data,
        ], $code);
    }


    protected function error($data, string $message = null, int $code)
    {
        return response()->json([
            'status' => 'An error has occurred.',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
