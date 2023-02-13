<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    public function register(Request $request){
        // dd($request->all());

        $validator = Validator::make($request->all(),[
            'name'=> 'required|string',
            'email'=> 'required|email',
            'password'=> 'required|min:3',
            'c_password'=> 'required|min:3'
        ]);

        if($validator->fails()){
            // dd($validator->messages());
            return $this->errorResponse($validator->messages(),422);
        }

        $new_user =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $new_user->createToken('sajad_shop')->accessToken;

        return $this->successResponse('success',[
            'user' => $new_user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request){
        // dd($request->all());

        $validator = Validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=> 'required|min:3',
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->messages(),422);
        }

        $user =User::where('email',$request->email)->first();

        if(! $user->exists() or ! Hash::check($request->password , $user->password) ){
            return $this->errorResponse('user not found',422);
        }


        $token = $user->createToken('sajad_shop')->accessToken;

        return $this->successResponse('success',[
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function logout(Request $request){
        // dd($request->all());


        auth()->user()->tokens->each(function($token, $key) {
            $token->delete();
        });

        return $this->successResponse('logged out',auth()->user(), 200);
    }
}
