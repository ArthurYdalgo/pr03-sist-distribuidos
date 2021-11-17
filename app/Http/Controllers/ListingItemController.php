<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingItem;
use Illuminate\Http\Request;

class ListingItemController extends Controller
{
    public function list(){
        return auth()->user()->listingItems()->get();
    }

    public function get($listing_item_id){        
        $listing_item = ListingItem::with('listing')->find($listing_item_id);
        
        if(!$listing_item){
            return response()->json(['error_message' => 'listing item not found'],404);
        }
        
        if(auth()->user()->id != $listing_item->user()->id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        return $listing_item;
    }

    public function update(Request $request, $listing_item_id){        

        $this->validate($request, [
            'text' => 'required|string'
        ]);

        $listing_item = ListingItem::find($listing_item_id);

        if(!$listing_item){
            return response()->json(['error_message' => 'listing not found'],404);
        }

        if(auth()->user()->id != $listing_item->user()->id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        $text = $request->input('text');

        $listing_item->update($request->only(['text']));

        return $listing_item;
    }

    public function check($listing_item_id){
        $listing_item = ListingItem::find($listing_item_id);

        if(!$listing_item){
            return response()->json(['error_message' => 'listing not found'],404);
        }

        if(auth()->user()->id != $listing_item->user()->id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        $listing_item->update(['checked' => true]);

        return $listing_item;
    }

    public function uncheck($listing_item_id){
        $listing_item = ListingItem::find($listing_item_id);

        if(!$listing_item){
            return response()->json(['error_message' => 'listing not found'],404);
        }

        if(auth()->user()->id != $listing_item->user()->id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        $listing_item->update(['checked' => false]);

        return $listing_item;
    }

    public function store(Request $request, $listing_id){
    
        $this->validate($request, [
            'text' => 'required|string'
        ]);

        $listing = Listing::find($listing_id);

        if($listing && auth()->user()->id != $listing->user_id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        $text = $request->input('text');

        $listing_item = ListingItem::create([
            'listing_id' => $listing->id,
            'text' => $text
        ]);

        return $listing_item;
    }

    public function destroy($listing_item_id){
        $listing_item = ListingItem::find($listing_item_id);

        if(!$listing_item){
            return response()->json(['error_message' => 'listing not found'],404);
        }

        if(auth()->user()->id != $listing_item->user()->id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        $listing_item->delete();            

        return $listing_item;
    }
    
}
