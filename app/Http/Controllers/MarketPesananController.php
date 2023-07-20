<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\MarketShoes;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class MarketPesananController extends Controller
{
    public function pending($slug_id , Request $request)
    {
        $getID = MarketShoes::where('slug_id' , $slug_id)->pluck('id');
        foreach($getID as $id){
            $shoe_id = $id;
        }

        $all_pesanan = Pesanan::where('harga_total' , '!=' , '0')
                            ->where('market_shoe_id' , $shoe_id)
                            ->where('status_pesanan' , 'pending')

                            ->orWhere('status_pesanan' , 'cancel')
                            ->where('harga_total' , '!=' , '0')
                            ->where('market_shoe_id' , $shoe_id)
                            ->with(['user' , 'market'])->latest()->paginate(10)->withQueryString();
                          
        if($request->search){
            $all_pesanan = Pesanan::orderByRaw("kode_pesanan like '%$request->search%' DESC")
            ->where('harga_total' , '!=' , '0')
            ->where('market_shoe_id' , $shoe_id)
            ->where('status_pesanan' , 'pending')

            ->orWhere('status_pesanan' , 'cancel')
            ->where('harga_total' , '!=' , '0')
            ->where('market_shoe_id' , $shoe_id)
            ->with(['user' , 'market'])->latest()->paginate(10)->withQueryString();
        }

        $detail_order = DetailPesanan::with('pesanan')->latest()->get();

        return view('pesanan.pending_order' , [
            'title' => 'Pesanan Pending',
            'all_pesanan' => $all_pesanan,
            'details' => $detail_order,
            'slug_id' => $slug_id
        ]);
    }


    public function process($slug_id , Request $request)
    {
        $getID = MarketShoes::where('slug_id' , $slug_id)->pluck('id');
        foreach($getID as $id){
            $shoe_id = $id;
        }

        $all_pesanan = Pesanan::where('harga_total' , '!=' , '0')
                            ->where('market_shoe_id' , $shoe_id)
                            ->where('status_pesanan' , 'on process')
                            ->with(['user' , 'market'])->latest()->paginate(10)->withQueryString();
        
        if($request->search){
             $all_pesanan = Pesanan::orderByRaw("kode_pesanan like '%$request->search%' DESC")
                            ->where('harga_total' , '!=' , '0')
                            ->where('market_shoe_id' , $shoe_id)
                            ->where('status_pesanan' , 'on process')
                            ->with(['user' , 'market'])->latest()->paginate(10)->withQueryString();
        }

        $detail_order = DetailPesanan::with('pesanan')->latest()->get();

        return view('pesanan.process_order' , [
            'title' => 'Pesanan On Process',
            'all_pesanan' => $all_pesanan,
            'details' => $detail_order,
            'slug_id' => $slug_id
        ]);
    }


    public function done($slug_id , Request $request)
    {
        $getID = MarketShoes::where('slug_id' , $slug_id)->pluck('id');
        foreach($getID as $id){
            $shoe_id = $id;
        }

        $all_pesanan = Pesanan::where('harga_total' , '!=' , '0')
                            ->where('market_shoe_id' , $shoe_id)
                            ->where('status_pesanan' , 'done')
                            ->with(['user' , 'market'])->latest()->paginate(10)->withQueryString();
        
        if($request->search){
            $all_pesanan = Pesanan::orderByRaw("kode_pesanan like '%$request->search%' DESC")
            ->where('harga_total' , '!=' , '0')
            ->where('market_shoe_id' , $shoe_id)
            ->where('status_pesanan' , 'done')
            ->with(['user' , 'market'])->latest()->paginate(10)->withQueryString();

        }

        $detail_order = DetailPesanan::with('pesanan')->latest()->get();

        return view('pesanan.done_order' , [
            'title' => 'Pesanan Selesai',
            'all_pesanan' => $all_pesanan,
            'details' => $detail_order,
            'slug_id' => $slug_id
        ]);
    }
}
