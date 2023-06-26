<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function successRes($data = null, $msg = "sukses", $code = 200)
    {
        if ($data != null) {
            return response()->json([
                "massage" => $msg,
                "data" => $data,
                'status' => true
            ], $code);
        }
        return response()->json([
            "massage" => $msg,
            'status' => true
        ], $code);
    }
    public function errRes($msg, $code)
    {
        return response()->json([
            "massage" => $msg,
            'status' => false
        ], $code);
    }
}
