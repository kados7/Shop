<?php

namespace App\Traits;

trait ApiResponser{
    public function successResponse($message = null , $data , $code){
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ] , $code);
    }

    public function errorResponse($message = null , $code){
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => ''
        ] , $code);
    }
}
