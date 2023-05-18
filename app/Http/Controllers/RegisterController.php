<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    /**
     * Show the registration form
     *
     * @return void
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Register a new user via the API
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $response = Http::post('https://nervous-kalam.212-227-147-1.plesk.page/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() === 201) {
            $data = $response->json();

            if (isset($data['token'])) {
                $request->session()->put('user_token', $data['token']);
                return redirect()->route('api.login');
            }
        }

        // Registro fallido
        return redirect()->back()->with('error', 'Registro fallido');
    }
}
