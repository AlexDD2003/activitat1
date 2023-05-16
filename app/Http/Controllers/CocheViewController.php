<?php
namespace App\Http\Controllers;

use App\Models\Coche;
use GuzzleHttp\Client;

class CocheViewController extends Controller
{
    public function index()
    {
    $apiUrl = env('API_URL');

    $url = $apiUrl . '/coches';
    $client = new Client([
        'verify' => false
    ]);

    $response = $client->get($url);

    $coches = json_decode($response->getBody(), true);

    return view('coches.index', compact('coches'));
    }
    
    public function show($id)
{   
    $apiUrl = env('API_URL');
    $url = $apiUrl . '/coches';
    $client = new Client([
        'verify' => false
    ]);
    $response = $client->get($url);
    $data = json_decode($response->getBody(), true);

    foreach ($data as $coche) {
        if ($coche['id'] == $id) {
            return view('coches.show', ['coche' => $coche]);
        }
    }
}
}


