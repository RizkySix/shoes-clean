<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\JenisCleaning;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class PesananUpdateLessDataController extends Controller
{
    public function update_data($kode_pesanan, Request $request)
    {
       
        $messages = [
            'nama_pemesan.min' => 'Masukkan nama pemesan dengan benar.',
            'no_hp.min' => 'Masukkann nomor handphone yang benar.',
            'alamat' => 'Silahkan masukkan alamat dengan lengkap'
        ];
       
        if(!session('pesanan_filled')){
            $validatedData = $request->validate([
                'nama_pemesan' => 'required|string|min:3' , 
                'no_hp' => 'required|string|min:11',
                'alamat' => 'required|string|min:8'
            ] , $messages);
        }else{
           if($request->nama_pemesan || $request->no_hp || $request->alamat){
            return back();
           }
        }

        $validatedData['user_id'] = auth()->user()->id;

        //kembalikan user jika tidak ada memilih cleaning
        if(!$request->cleaning){
            return back()->withErrors(['cleaning' => 'Cleaning harus diisi']);
        }

        //logic perhitungan total harga pesanan
        $allClean = $request->cleaning; //request dari input dengam nama cleaning #ini dalam bentuk array
        $total_harga = 0;
        foreach($allClean as $cln){
            $getdt = JenisCleaning::where('id' , $cln)->pluck('harga');
           foreach($getdt as $dt){
                $total_harga += $dt;
           }
        }

        $getTotal = Pesanan::where('kode_pesanan' , $kode_pesanan)->pluck('harga_total');
        foreach($getTotal as $hartot){
           $price = $hartot;
        }
      
        $end_price = $price + $total_harga;
        $validatedData['harga_total'] = $end_price;


        //buat detail pesanan
       /*  $messages2 = [
            'nama_sepatu.min' => 'Masukan nama sepatu yang benar.'
        ]; */
        $validatedData2 = $request->validate([
           /*  'nama_sepatu' => 'required|string|min:3', */
            'foto_sepatu' => 'nullable'
        ] );

        //cari id pesanan berdasarkan kode_pesanan
        $getId = Pesanan::where('kode_pesanan' , $kode_pesanan)->pluck('id');
        foreach($getId as $get){
            $pesanan_id = $get;
        }

        $validatedData2['pesanan_id'] =  $pesanan_id;
       
        //store image untuk foto_sepatu
        if($request->file('foto_sepatu')){
            $validatedData2['foto_sepatu'] = $request->file('foto_sepatu')->store('shoes_orders_images');
        }

        //menambahkan unread_notif kepada user
        $getTheUser = User::where('id' , $validatedData['user_id'])->pluck('unread_notif');
        foreach($getTheUser as $ussr){
           $unread_notif = $ussr;
        }
        

        Pesanan::where('kode_pesanan' , $kode_pesanan)->update($validatedData);
        if(!session('pesanan_filled')){
            $current_unread = $unread_notif + 1;
            User::where('id' , $validatedData['user_id'])->update(['unread_notif' => $current_unread]);
            cookie()->queue(cookie()->forget('readed_notif'));
       }
    
        session()->put('pesanan_filled' , true);

       $detail_pesanan = DetailPesanan::create($validatedData2);

        //insert ke pivot table
        $cleanID = $request->input('cleaning' , []);

        foreach($cleanID as $id){
            $detail_pesanan->cleanings()->attach($id);
        }

        return back();
    }
}
