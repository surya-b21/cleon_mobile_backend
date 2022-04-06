<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')])) {
            $success['token'] =  Auth::guard('web')->user()->createToken('API Token')->accessToken;
            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token['token'] =  $user->createToken('API Token')->accessToken;

        return response()->json($token, $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->OauthAcessToken()->delete();
            return 'Logout success';
        }
    }
}
