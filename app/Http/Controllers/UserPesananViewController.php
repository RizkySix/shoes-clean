<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class UserPesananViewController extends Controller
{
    public function view_orders()
    {
        $user_orders = Pesanan::where('user_id' ,  auth()->user()->id)
                                ->where('harga_total' , '!=' , '0')
                            ->where('status_pesanan' , '!=' , 'cancel')->latest()
                        ->paginate(10)->withQueryString();
                        
        $detail_orders = DetailPesanan::latest()->get();

        $on_proses = Pesanan::where('user_id' ,  auth()->user()->id)
                            ->where('harga_total' , '!=' , '0')
                            ->where('status_pesanan' , '!=' , 'cancel')
                            ->where('dinilai' , false)->count();

        $done = Pesanan::where('user_id' ,  auth()->user()->id)
                    ->where('harga_total' , '!=' , '0')
                    ->where('status_pesanan' , 'done')
                    ->where('dinilai' , true)->count();

        return view('pesanan.user_orders' , [
            'title' => 'User Orders',
            'user_orders' => $user_orders,
            'details' => $detail_orders,
            'on_proses' => $on_proses,
            'done' => $done
        ]);
    }

    public function end_orders($kode_pesanan)
    {
        $order = Pesanan::where('kode_pesanan' , $kode_pesanan)->get();
        return view('pesanan.end_orders' , [
            'title' => 'Pesanan Dibuat',
            'orders' => $order 
        ]);
    }

    public function cancel_orders(Pesanan $pesanan ,  Request $request)
    {

        $getUser = User::where('id' , $pesanan->user_id)->pluck('unread_notif');
        foreach($getUser as $unread_notif){
            if($unread_notif != 0){
                $new_unread = $unread_notif - 1;
            }else{
                $new_unread = $unread_notif;
            }
        }
  
        User::where('id' , $pesanan->user_id)->update(['unread_notif' => $new_unread]);
        
       Pesanan::where('kode_pesanan' , $pesanan->kode_pesanan)->update(['status_pesanan' => 'cancel' , 'dibatalkan' => $request->cancel_reason]);

       return back();
    }
}
