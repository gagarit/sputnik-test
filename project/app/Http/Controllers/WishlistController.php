<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add(Request $request)

    {
        $request->validate([
            'user_id' => 'required|exists:my_users,id',
            'place_id' => 'required|exists:places,id'
        ]);

        $wishlistCount = Wishlist::where('user_id', $request->user_id)->count();

        if ($wishlistCount >= 3) {
            return response()->json(['message' => 'Максимум 3 места могут быть добавлены в желаемое'], 400);
        }

        if (Wishlist::where('user_id', $request->user_id)->where('place_id', $request->place_id)->exists()) {
            return response()->json(['message' => 'Это место уже добавлено в желаемое'], 400);
        }

        Wishlist::create([
            'user_id' => $request->user_id,
            'place_id' => $request->place_id,
        ]);

        return response()->json(['message' => 'место добавлено в желаемое']);
    }

    public function getWishlist($userId)
    {
        $wishlists = Wishlist::with('place')->where('user_id', $userId)->get();
        
        return response()->json($wishlists);
    }
}
