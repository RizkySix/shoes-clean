<?php

namespace App\Http\Controllers;

use App\Models\DashboardContent;
use App\Models\MarketShoes;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $request->session()->forget('on_market');

        $pesanan_kosong = Pesanan::where('harga_total' , '0')->where('user_id' , null)->where('created_at' , '<' , Carbon::now()->subHours(2))->pluck('id');
        foreach($pesanan_kosong as $kosong){
            Pesanan::destroy($kosong);
        }

        $konten = DashboardContent::all();

        return view('dashboard' , [
            'title' => 'Dashboard',
            'das_konten' => $konten
        ]);
    }


    
}
