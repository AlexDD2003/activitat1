<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Show the login form
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    /**
     * Log the user via the API
     *
     * @param Request $request
     * @return void
     */

    public function login(Request $request)
    {
        $response = Http::post('https://nervous-kalam.212-227-147-1.plesk.page/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() === 200) {
            $data = $response->json();

            if (isset($data['token'])) {
                // Inicio de sesión exitoso
                $request->session()->put('user_token', $data['token']);
                return redirect()->route('coches.index');
            }
        }

        // Inicio de sesión fallido
        return redirect()->back()->with('error', 'Inicio de sesión fallido');
    }
}
