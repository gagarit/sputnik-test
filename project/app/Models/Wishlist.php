<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'place_id'];

    public function user()
    {
        return $this->belongsTo(MyUser::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
