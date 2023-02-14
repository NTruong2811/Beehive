<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function check_email(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|unique:users,email",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 1
            ]);
        } else {
            return response()->json([
                'message' => "Accept Email",
                'status' => 0
            ]);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "birthday" => "required",
            "gender" => "required",
            "password" => "required|min:6|max:20",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 1
            ]);
        } else {
            try {
                $user = users::create([
                    'email' => $request['email'],
                    'name' => $request['name'],
                    'birthday' => $request['birthday'],
                    'avatar' => '/images/avt_def.jpg',
                    'gender' => $request['gender'],
                    'password' => bcrypt($request['password'])
                ]);

                return response()->json([
                    'message' => 'Register success',
                    'status' => 0
                ]);
            } catch (\Throwable $th) {
                return $th;
                return response()->json([
                    'message' => 'Something went wrong please try again later',
                    'status' => 1
                ]);
            }
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required|min:6|max:20"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 1
            ]);
        }
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Incorrect email or password',
                'status' => 1
            ]);
        }
        $user = Auth::user();
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'token' => $token,
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'avatar' => $user['avatar']
            ],
            'status' => 0
        ], 200);
    }
}
