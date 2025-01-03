<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        return response()->json($places);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'placename' => 'required|string',
            'latitude'  => 'required|integer',
            'longitude' => 'required|integer',
        ]);

        $place = Place::create($validatedData);
        return response()->json($place, 201);
    }

    public function show(Place $place){
        return response()->json($place);
    }
}
