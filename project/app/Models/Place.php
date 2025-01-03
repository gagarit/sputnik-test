<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;

    protected $table = 'places';
    protected $fillable = ['placename' ,'latitude', 'longitude'];

  
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
