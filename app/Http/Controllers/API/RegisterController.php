<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class RegisterController
{
    /**
     * Register api
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function register(Request $request) {
        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $request
         * @return \Illuminate\Contracts\Validation\Validator
         */
        $valid = validator($request->only('email', 'name', 'password','mobile'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'mobile' => 'required',
        ]);

        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return Response::json($jsonError);
        }

        $data = request()->only('email','name','password','mobile');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile' => $data['mobile']
        ]);

        // And created user until here.

        $client = Client::where('password_client', 1)->first();

        // Is this $request the same request? I mean Request $request? Then wouldn't it mess the other $request stuff? Also how did you pass it on the $request in $proxy? Wouldn't Request::create() just create a new thing?

        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $data['email'],
            'password'      => $data['password'],
            'scope'         => null,
        ]);

        // Fire off the internal request.
        $token = Request::create(
            'oauth/token',
            'POST'
        );
        return Route::dispatch($token);
    }

   /* public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $token = $user->createToken('Login')->accessToken;

            return response()->json($token);
        }
    }*/


    public function login(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response(['data' => $validator->errors()->all() , 'status' => 400 ] , 400);
        }


        if(! auth()->validate(['email' => $request->input('email') , 'password' => $request->input('password')])) {
            return response(['data' => 'Unauthenticate' , 'status' => 401] , 401);
        }

        $user = User::whereEmail($request->input('email'))->first();
        $token = $user->createToken('Roocket App Android')->accessToken;

        return response(['result' => $token , 'status' => 200]);
    }

}