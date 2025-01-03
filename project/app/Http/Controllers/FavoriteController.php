<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\MyUser;

class FavoriteController extends Controller
{
    public function add(Request $request, $placeId)
    {
        $userId = $request->input('user_id'); 

        $user = MyUser::findOrFail($userId);
        $place = Place::findOrFail($placeId);

        if ($user->favorites()->count() >= 3) {
            return response()->json(['message' => 'Вы можете добавить не более 3-х мест в желаемое.'], 400);
        }

        if ($user->favorites()->where('place_id', $placeId)->exists()) {
            return response()->json(['message' => 'Это место уже добавлено в желаемое.'], 400);
        }

        $user->favorites()->attach($place);

        return response()->json(['message' => 'Место добавлено в желаемое.']);
    }

    public function list(Request $request)
       {
           $userId = $request->input('user_id');

           $user = MyUser::findOrFail($userId);
           return response()->json($user->favorites);
       }
}
