<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pet::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'color' => 'required',
            'size' => 'required|max:2',
        ]);


        $pet = Pet::create([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'color' => $request['color'],
            'size' => $request['size'],
        ]);

        return $pet;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return $pet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'color' => 'required',
            'size' => 'required|max:2',
        ]);

        $pet->update([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'color' => $request['color'],
            'size' => $request['size'],
        ]);

        return $pet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
    }
    static function switchSpecies(){

        $pet1 = Pet::whereIn('specie', ['bird'])->get();
        $pet2 = Pet::whereIn('specie', ['bunny'])->get();
        $pet3 = Pet::whereIn('specie', ['dog'])->get();
        $pet4 = Pet::whereIn('specie', ['cat'])->get();

        foreach ($pet1 as $pet){
            switch($pet['specie']){
                case 'bird';
                $pet->update([
                    'specie' => 'passaro'
                ]);
                break;
                    default:
                break;
            }
            $pet->save();
        }
    
        foreach ($pet2 as $pet){
            switch($pet['specie']){
                case 'bunny';
                $pet->update([
                    'specie' => 'passaro'
                ]);
                break;
                default:
                break;
            }
            $pet->save();
        }

        foreach ($pet3 as $pet){
            switch($pet['specie']){
                case 'dog';
                $pet->update([
                    'specie' => 'cachorro'
                ]);
                break;
                    default:
                break;
            }
            $pet->save();
        }

        foreach ($pet4 as $pet){
            switch($pet['specie']){
                case 'cat';
                $pet->update([
                    'specie' => 'gato'
                ]);
                break;
                    default:
                break;
            }
            $pet->save();
        }

        $pets = Pet::all();
        foreach ($pets as $pet){
            if(
            $pet['specie'] == 'passaro' or 
            $pet['specie'] == 'coelho' or 
            $pet['specie'] == 'cachorro' or 
            $pet['specie'] == 'gato' ){
                $pet->save();
            }else{
                $pet->update([
                    'specie' => 'especie nao cadastrada'
                ]);
                $pet->save();
            }
        }
    }
}   

