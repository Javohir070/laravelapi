<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function response($massage , $data)
    {
        return response()->json([
            "success" => true,
            "massage" => $massage,
            "data" => $data
        ]);
    }

    public function korinish($data)
    {
        return response()->json([
            "data" => $data
        ]);
    }

    public function error($message ,$data)
    {
        return response()->json([
            "success" => false,
            "massage" => $message,
            "data" => $data
        ]);
    }
}
