<?php

namespace App\Http\Controllers;

use App\Models\MarketShoes;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DataForNavbarController extends Controller
{
    public function pesanan_users()
    {
        $pss_nan = Pesanan::where('user_id' , auth()->user()->id)->where('harga_total' , '!=' , '0')->where('status_pesanan' , '!=' , 'cancel')->where('pesanan_diantar' , false)->latest()->paginate(5);
        return $pss_nan;
    }

    public function check_notif()
    {
        $check_notif  = User::where('id' , auth()->user()->id)->pluck('unread_notif');
        foreach($check_notif as $notif){
            $theNotif = $notif;
        }
        return $theNotif;
    }

    public function readed_notif_cookies(Request $request)
    {
        User::where('id' , auth()->user()->id)->update(['unread_notif' => 0]);
         cookie()->queue(cookie('readed_notif', 'available', 1051200));


         return response('readed_notif tersedia');
    }

    public function get_market()
    {
        $getMarketSlugID = MarketShoes::where('user_id' , auth()->user()->id)->pluck('slug_id');

        return $getMarketSlugID;
    }

    public function get_market_shoe_id()
    {
       $market = MarketShoes::where('user_id' , auth()->user()->id)->pluck('slug_id');

        foreach($market as $id){
            $slug_id = $id;
        }

        return $slug_id;
    }

    public function get_market_profile()
    {
       $market = MarketShoes::where('user_id' , auth()->user()->id)->pluck('foto_toko');

        foreach($market as $foto){
            $foto_toko = $foto;
        }

        return $foto_toko;
    }
}
