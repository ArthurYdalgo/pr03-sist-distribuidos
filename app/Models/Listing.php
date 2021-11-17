<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function listingItems(){
        return $this->hasMany('App\Models\ListingItem');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
