<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\MailDoneOrder;
use App\Models\DetailPesanan;
use App\Models\JenisCleaning;
use App\Models\Pesanan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $market_id = session('market_id');
        $cleanings_normal = JenisCleaning::where('market_shoe_id' , $market_id)->where('category_cleaning' , 'Normal Cleaning')->latest()->get();
        $cleanings_repair = JenisCleaning::where('market_shoe_id' , $market_id)->where('category_cleaning' , 'Repair')->latest()->get();
        $cleanings_repaint = JenisCleaning::where('market_shoe_id' , $market_id)->where('category_cleaning' , 'Repaint')->latest()->get();
        return view('pesanan.create', [
            'title' => 'Buat Pesanan',
            'cleanings_normal' => $cleanings_normal,
            'cleanings_repair' => $cleanings_repair,
            'cleanings_repaint' => $cleanings_repaint,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'kode_pesanan' => 'nullable|string|max:10|unique:pesanans',
            'market_shoe_id' => 'required|integer'
        ]);

        //membuat 10 angka uniq, penjelas bisa dilihat di internet atau documentaion php
        $validatedData['kode_pesanan'] = str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        $getKodePesanan = $validatedData['kode_pesanan'];

        session()->put('market_id' , $validatedData['market_shoe_id']);
        Pesanan::create($validatedData);
        session()->put('kode_pesanan' , $getKodePesanan);

        return redirect(route('pesanan.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
   
        if($request->diantar){

            $getUser = User::where('id' , $pesanan->user_id)->pluck('unread_notif');
            foreach($getUser as $unread_notif){
                if($unread_notif != 0){
                    $new_unread = $unread_notif - 1;
                }else{
                    $new_unread = $unread_notif;
                }
            }
            
            User::where('id' , $pesanan->user_id)->update(['unread_notif' => $new_unread]);

            Pesanan::where('id' , $pesanan->id)->update(['pesanan_diantar' => true]);
            return back();
        }

        if($request->pending){
            Pesanan::where('id' , $pesanan->id)->update(['status_pesanan' => 'on process']);
            return back();
        }

        if($request->process){
            Pesanan::where('id' , $pesanan->id)->update(['status_pesanan' => 'done']);

            //kirim email ke pemesan untuk memberitau sepatunya sudah selesai dicuci
            $theMsg = [
                'subject' => 'Informasi Sepatu Selesai',
                'judul' => 'Pesanan selesai pada ' . $pesanan->market->nama_toko,
                'nama' => $pesanan->user->nama,
                'market' => $pesanan->market->nama_toko,
                'kode_pesanan' => $pesanan->kode_pesanan,
                'link_mulai' => 'http://shoes-clean.test/login',
            ];

         /*    SendMailJob::dispatch($pesanan->user->email , $theMsg); */

            try {

                //kirim pesan ke email pemesan (bisa memakai cc,bcc tergantung keperluan bisa cari di docoumentasi laravel Mail penjelasan dari kedua method tersebut)
                Mail::to($pesanan->user->email)->send(new MailDoneOrder($theMsg));
            } catch (Exception $th) {
                return back();
            }

            return back();
        }

        //this is from user not from market @rizky666
        if($request->dinilaiOrder){
            $justTakeValue = $pesanan->market_shoe_id;
            Pesanan::where('id' , $pesanan->id)->update(['dinilai' => true]);
            session()->put('rating' , $justTakeValue);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pesanan $pesanan)
    {

        //logic hapus data terkait detail dan pivotnya
        $theDetail = DetailPesanan::where('pesanan_id' , $pesanan->id)->pluck('foto_sepatu' , 'id');
       
        foreach($theDetail as $id => $foto_sepatu){
            if($foto_sepatu){
                Storage::delete($foto_sepatu);
            }

            //hapus data pivot
            $findDetail = DetailPesanan::find($id);
            $findDetail->cleanings()->wherePivot('detail_pesanan_id' , $id)->detach();
            $delDetail = DetailPesanan::destroy($id);
        
        }

       if($request->cancelOrder){
         Pesanan::destroy($pesanan->id);
        return back();
       }


       //untuk saat ini delete dibawah belum digunakan
       if($request->doneOrder){
        
        Pesanan::destroy($pesanan->id);
        return back();
       }

    }
}
