<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche; 

class CartController extends Controller
{
    public function add(Request $request, Coche $coche)
{
    $cart = $request->session()->get('cart', []);
    $cart[$coche->id] = $coche;
    $request->session()->put('cart', $cart);

    return redirect()->route('cart.show');
}




public function show(Request $request)
{
    $cart = $request->session()->get('cart', []);

    $cartTotal = 0;
    foreach ($cart as $coche) {
        $cartTotal += $coche->precio;
    }

    return view('cart', ['coches' => $cart, 'cartTotal' => $cartTotal]);
}

public function remove(Request $request, Coche $coche)
{
    $cart = $request->session()->get('cart', []);

    if (isset($cart[$coche->id])) {
        unset($cart[$coche->id]);
        $request->session()->put('cart', $cart);
    }

    return redirect()->route('cart.show');
}



}