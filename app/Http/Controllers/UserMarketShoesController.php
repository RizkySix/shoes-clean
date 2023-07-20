<?php

namespace App\Http\Controllers;

use App\Models\JenisCleaning;
use App\Models\MarketShoes;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class UserMarketShoesController extends Controller
{
    public function view($slug_id , Request $request)
    {
        $getNull = MarketShoes::where('slug_id' , $slug_id)->get();
        foreach($getNull as $null){
            $getService = JenisCleaning::where('market_shoe_id' , $null->id)->get();
    
            if($null->foto_toko == null || $null->pemilik_toko == null){
                session()->put('fill_market' , 'Lengkapi informasi toko kamu, agar orang lain dapat melihat toko kamu !');
            }else{
                
                if(!$getService->count()){
                    session()->put('fill_market' , 'Selangkah lagi, ayo buat menu cleaning yang toko kamu tawarkan !');
                }else{
                    $request->session()->forget('fill_market');
                    //bisa lakukan sesuatu dsini
                }
            }
        }

        session()->put('on_market' , $null->id);

        $pending = Pesanan::where('market_shoe_id' , $null->id)->where('harga_total' , '!=' , '0')->where('status_pesanan' , 'pending')->orWhere('status_pesanan' , 'cancel')->where('market_shoe_id' , $null->id)->where('harga_total' , '!=' , '0')->latest()->get();

        $process = Pesanan::where('market_shoe_id' , $null->id)->where('harga_total' , '!=' , '0')->where('status_pesanan' , 'on process')->latest()->get();

        $done = Pesanan::where('market_shoe_id' , $null->id)->where('harga_total' , '!=' , '0')->where('status_pesanan' , 'done')->latest()->get();

        return view('market.dashboard_market' , [
            'title' => 'Dashboard Toko',
            'slug_id' => $slug_id,
            'pending' => $pending,
            'process' => $process,
            'done' => $done,
        ]);
    }

    public function create()
    {
        return view('market.create_market' , [
            'title' => 'Buka Toko'
        ]);
    }

    public function show_market(MarketShoes $market_shoe)
    {
        $normal = JenisCleaning::where('market_shoe_id' , $market_shoe->id)->where('category_cleaning' , 'Normal Cleaning')->latest()->get();
        $repair = JenisCleaning::where('market_shoe_id' , $market_shoe->id)->where('category_cleaning' , 'Repair')->latest()->get();
        $repaint = JenisCleaning::where('market_shoe_id' , $market_shoe->id)->where('category_cleaning' , 'Repaint')->latest()->get();

        return view('market.show_market' , [
            'title' => 'Show Toko',
            'market' => $market_shoe,
            'normal' => $normal,
            'repair' => $repair,
            'repaint' => $repaint,
        ]);
    }


    public function revenue_market(MarketShoes $market_shoe , Request $request)
    {
        $request->session()->forget('revenue_first');
        $request->session()->forget('revenue_sec');

        $revenue_market = Pesanan::where('market_shoe_id' , $market_shoe->id)
                                ->where('harga_total' , '!=' , '0')
                                ->where('pesanan_diantar' , true)
                                ->where('created_at' , 'like' , '%' .  Carbon::now()->format('Y-m-d') . '%')
                                ->with(['user' , 'market'])->latest()->get();
                                
        $revenue_kemarin = Pesanan::where('market_shoe_id' , $market_shoe->id)
                                ->where('harga_total' , '!=' , '0')
                                ->where('pesanan_diantar' , true)
                                ->where('created_at' , 'like' , '%' .  Carbon::now()->subDays(1)->format('Y-m-d') . '%')
                                ->with(['user' , 'market'])->latest()->get();

        if($request->revenue_first && $request->revenue_sec)
        {
            $date1 = Carbon::parse($request->revenue_first)->setTime(00 , 00 , 01);
            $date2 = Carbon::parse($request->revenue_sec)->setTime(23 , 59 , 59);
            $revenue_market = Pesanan::where('market_shoe_id' , $market_shoe->id)
            ->where('harga_total' , '!=' , '0')
            ->where('pesanan_diantar' , true)
            ->whereBetween('created_at' , [$date1 , $date2])
            ->with(['user' , 'market'])->latest()->get();

            //make session for generating pdf
            session()->put('revenue_first' , $date1);
            session()->put('revenue_sec' , $date2);
        }

        if($request->revenue_first && !$request->revenue_sec)
        {
            $revenue_market = Pesanan::where('market_shoe_id' , $market_shoe->id)
            ->where('harga_total' , '!=' , '0')
            ->where('pesanan_diantar' , true)
            ->where('created_at' , 'like' , '%' .  $request->revenue_first . '%')
            ->with(['user' , 'market'])->latest()->get();

              //make session for generating pdf
              session()->put('revenue_first' , $request->revenue_first);
              $request->session()->forget('revenue_sec');
            
        }

        if($request->revenue_sec && !$request->revenue_first)
        {
            $revenue_market = Pesanan::where('market_shoe_id' , $market_shoe->id)
            ->where('harga_total' , '!=' , '0')
            ->where('pesanan_diantar' , true)
            ->where('created_at' , 'like' , '%' .  $request->revenue_sec . '%')
            ->with(['user' , 'market'])->latest()->get();

             //make session for generating pdf
             session()->put('revenue_sec' , $request->revenue_sec);
             $request->session()->forget('revenue_first');
        }


        $today = Carbon::now()->format('D-M-Y');
        return view('market.revenue_market' , [
            'title' => 'Revenue Market',
            'market_shoe' => $market_shoe,
            'revenue_market' => $revenue_market,
            'revenue_kemarin' => $revenue_kemarin,
            'today' => $today
        ]);
    }


    public function generate_pdf(MarketShoes $market_shoe , Request $request)
    {
       
        $all_orders = Pesanan::where('market_shoe_id' , $market_shoe->id)
        ->where('harga_total' , '!=' , '0')
        ->where('pesanan_diantar' , true)
        ->where('created_at' , 'like' , '%' .  Carbon::now()->format('Y-m-d') . '%')
        ->with(['user' , 'market'])->latest()->get();

        if(session('revenue_first') && session('revenue_sec'))
        {
            $all_orders = Pesanan::where('market_shoe_id' , $market_shoe->id)
            ->where('harga_total' , '!=' , '0')
            ->where('pesanan_diantar' , true)
            ->whereBetween('created_at' , [session('revenue_first') , session('revenue_sec')])
            ->with(['user' , 'market'])->latest()->get();

        }

        if(session('revenue_first') && !session('revenue_sec'))
        {
            $all_orders = Pesanan::where('market_shoe_id' , $market_shoe->id)
            ->where('harga_total' , '!=' , '0')
            ->where('pesanan_diantar' , true)
            ->where('created_at' , 'like' , '%' .  session('revenue_first') . '%')
            ->with(['user' , 'market'])->latest()->get();
            
        }

        if(session('revenue_sec') && !session('revenue_first'))
        {
            $all_orders = Pesanan::where('market_shoe_id' , $market_shoe->id)
            ->where('harga_total' , '!=' , '0')
            ->where('pesanan_diantar' , true)
            ->where('created_at' , 'like' , '%' .  session('revenue_sec') . '%')
            ->with(['user' , 'market'])->latest()->get();
            
        }

        $today = Carbon::now()->format('d-M-Y');
        $pdf = PDF::loadView('market.revenue_pdf', [
            'market' => $market_shoe,
            'orders' => $all_orders,
            'today' => $today
        ]);
        return $pdf->stream('Revenue-' . $market_shoe->nama_toko . '.pdf');
    }

   
}
