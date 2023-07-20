<?php

namespace App\Http\Controllers;

use App\Models\MarketShoes;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating($id , Request $request)
    {
        
        $getMarket = MarketShoes::where('id' , $id)->get();
        foreach($getMarket as $market){
            $total_star = $market->jumlah_star;
            $total_participant = $market->like_user;
            $new_rating = $market->rating;
        }

       if($request->rating){
        $total_star += $request->rating;
        $total_participant += 1;

        $new_rating = $total_star / $total_participant;
        $new_rating = number_format($new_rating , 1);
        $new_rating = sprintf('%.1f', $new_rating);
       }
      
        MarketShoes::where('id' , $id)->update(['jumlah_star' => $total_star , 'like_user' => $total_participant , 'rating' => $new_rating]);
        $request->session()->forget('rating');

        return back()->with('done' , $id);
    }
}
