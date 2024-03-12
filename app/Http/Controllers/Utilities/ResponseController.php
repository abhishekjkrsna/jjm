<?php

namespace App\Http\Controllers\Utilities;

use Illuminate\Routing\Controller;
use Illuminate\Http\Response;


class ResponseController extends Controller
{
    public static function sendResponse($success, $message, $data, $code)
    {
        $response = [
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ];

        return response()->json($response, $code);
    }
}
