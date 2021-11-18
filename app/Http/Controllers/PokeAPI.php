<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PokeApi {

    public static function PokemonList($url){
        $client = new Client([
            'base_uri' => 'https://pokeapi.co/api/v2/',
        ]);

        $response = $client->request('GET', $url);
        
        return json_decode( $response->getBody()->getContents() );
    }

}