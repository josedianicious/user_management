<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * user regisration
     * param Request request
     * @return user
     */
    public function userRegister(Request $request){
        try {
            //validate user
            $validate_user = Validator::make($request->all(),
            [
                'name' => "required",
                'email' => "required|email|unique:users,email",
                'profile_image' => 'base64|image|mime:jpg,jpeg,png,gif',
                'sex' => 'required'
            ]
            );
            if ($validate_user->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate_user->errors()
                ],200);
            }
            $inputs = array(
                'name' => $request->name,
                'email' => $request->email,
                'sex' => $request->sex
            );
            $user = User::create($inputs);
            $userLogin  = UserLogin::create([
                'user_id' => $user->user_id,
                'user_name' => $request->email,
                'password' => Hash::make('123456')
            ]);
            return response()->json([
                'status' => true,
                'message' => 'User registration successful',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ],500);
        }

    }

    public function userLogin(Request $request)
    {
        try {
            //validate
            $validateUser = Validator::make($request->all(),
            [
                'user_name' => 'required',
                'password' => 'required'
            ]);
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ],200);
            }
            $user = UserLogin::where('user_name',$request->user_name)->first();
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not exists.',
                ], 200);
            }
            if (Hash::check($request->password,$user->password)){
                return response()->json([
                    'status' => true,
                    'message' => 'User Successfully Logged-in.',
                    'token' => $user->user->createToken("API TOKEN")->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentails',
                ], 200);

            }



        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' =>  $th->getMessage()
            ],500);

        }
    }
}
