<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request as Request;

class ListingController extends Controller
{
    public function list(){
        return auth()->user()->listings()->withCount('listingItems')->get();
    }

    public function get($id){        
        $listing = Listing::with('listingItems')->find($id);
        
        if(!$listing){
            return response()->json(['error_message' => 'listing not found'],404);
        }

        if(auth()->user()->id != $listing->user_id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        return $listing;
    }

    public function update(Request $request, $id){        

        $this->validate($request, [
            'name' => 'required|string',
        ]);
        
        $listing = Listing::find($id);                
    
        if(!$listing){
            return response()->json(['error_message' => 'listing not found'],404);
        }

        if(auth()->user()->id != $listing->user_id){
            return response()->json(['error_message' => 'unathorized'],403);
        }
        
        $listing->update($request->only(['name']));

        return $listing;
    }

    public function store(Request $request){
    
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $name = $request->input('name');

        $listing = Listing::create([
            'user_id' => auth()->user()->id,
            'name' => $name
        ]);

        return $listing;
    }

    public function destroy($id){
        $listing = Listing::withCount('listingItems')->find($id);

        if(!$listing){
            return response()->json(['error_message' => 'listing not found'],404);
        }

        if(auth()->user()->id != $listing->user_id){
            return response()->json(['error_message' => 'unathorized'],403);
        }

        $listing->delete();            

        return $listing;
    }
    
}
