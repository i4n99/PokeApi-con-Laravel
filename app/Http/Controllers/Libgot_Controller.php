<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PokeApi;
use App\Pokemon;

class Libgot_Controller extends Controller
{
    public function index(){
        $pokemonNameList = PokeApi::PokemonList('pokemon?limit=15');
        // dd($pokemonNameList->results);
        return view('pokemon-fast')->with('pokemonList', $pokemonNameList->results);
    }

    public function pokemonDetail(Request $request){
        $data = $request->input();
        // dd($data);
        $pokemonStats = PokeApi::PokemonList('pokemon/' . $data['name']);
        // dd($pokemonStats);
        $pokemonStats->upperCaseName = ucwords($data['name']);
        return json_encode($pokemonStats);
        // dd($pokemonList);
    }

    /* private function pokemonDetailComplete(){
        foreach($pokemonNameList->results as $key=>$p){
            // dd($pokemon);
            $pokemonInfo = PokeApi::PokemonList('pokemon/' . $p->name);
            // dd($pokemonInfo);
            // $pokemonList[];
            $pokemonList[$key]->name = $pokemonInfo->name;
            $pokemonList[$key]->type = $pokemonInfo->types[0]->type->name;
            // $pokemonList[$key]->name = $pokemonInfo->weight;
        }
        // dd($pokemonList);
    } */
}
