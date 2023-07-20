<?php

use App\Models\DetailPesanan;
use App\Models\Event;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if (!function_exists('the_expired_orders')) {
    function the_expired_orders() {
        $thereDays = Carbon::now()->subHours(72);
        $expired_orders = Pesanan::where('status_pesanan' , 'pending')->where('created_at' , '<' , $thereDays)->pluck('id');
       foreach($expired_orders as $expired){
            $detailPesanan = DetailPesanan::where('pesanan_id' , $expired)->pluck('foto_sepatu' , 'id');
            foreach($detailPesanan as $id => $foto_sepatu){
                if($foto_sepatu){
                    Storage::delete($foto_sepatu);
                }
                //delete pivot dan detail
                $findDetail = DetailPesanan::find($id);
                $findDetail->cleanings()->wherePivot('detail_pesanan_id' , $id)->detach();
                DetailPesanan::destroy($id);

            }

            Pesanan::destroy($expired);
       }

    }
}

if (!function_exists('cancel_orders')) {
    function cancel_orders() {
        $thereDays = Carbon::now()->subHours(72);
        $expired_orders = Pesanan::where('status_pesanan' , 'cancel')->where('updated_at' , '<' , $thereDays)->pluck('id');
       foreach($expired_orders as $expired){
        $detailPesanan = DetailPesanan::where('pesanan_id' , $expired)->pluck('foto_sepatu' , 'id');
        foreach($detailPesanan as $id => $foto_sepatu){
            if($foto_sepatu){
                Storage::delete($foto_sepatu);
            }
            //delete pivot dan detail
            $findDetail = DetailPesanan::find($id);
            $findDetail->cleanings()->wherePivot('detail_pesanan_id' , $id)->detach();
            DetailPesanan::destroy($id);

        }
            Pesanan::destroy($expired);
       }

    }
}

if (!function_exists('expired_events_post')) {
    function expired_events_post() {

     $expired_event = Event::all();
     foreach($expired_event as $event){
        $duration = Carbon::now()->subDays($event->durasi);
        if($event->created_at < $duration){
            if($event->foto_event){
                Storage::delete($event->foto_event);
            }
            Event::destroy($event->id);
        }
     }

    }
}


?>