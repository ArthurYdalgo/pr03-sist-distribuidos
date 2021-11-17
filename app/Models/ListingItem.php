<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingItem extends Model
{
    protected $fillable = [
        'listing_id', 'text', 'checked'
    ];

    public function listing(){
        return $this->belongsTo('App\Models\Listing');
    }

    public function user(){
        return $this->listing()->user();
    }
}
