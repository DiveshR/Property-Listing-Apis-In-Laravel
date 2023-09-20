<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponse;

    public function login(LoginUserRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {

            $user = Auth::user();

            return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token')->plainTextToken,
            ]);
        }

        return $this->error('', 'Invalid Credentials', 401);
    }

    public function register(RegisterUserRequest $request)
    {
        // $request->validate($request->only(['name','email','password']));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have successfully been logged out',

        ]);
    }
}
