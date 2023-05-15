<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens;

    /**
     * Register a new user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        $token = $user->createToken('MyAppToken')->plainTextToken;

        return response()->json([
            'message' => 'Successfully registered.',
            'token' => $token,
            'user' => $user
        ], 201);
    }

    /**
     * Log the user in and return a token.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid login credentials.'
            ], 401);
        }

        $user = $request->user();
        $token = $user->createToken('MyAppToken')->plainTextToken;

        return redirect()->route('coches.index');

        return response()->json([
            'message' => 'Successfully logged in.',
            'token' => $token
        ], 200);
    }

    /**
     * Log the user out (invalidate the token).
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Get the authenticated user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }
}