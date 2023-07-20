<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    public function store(Request $request)
    {
        $getData = Pesanan::where('kode_pesanan' , session('kode_pesanan'))->pluck('id');
       foreach($getData as $data){
            $id_pesanan = $data;
       }
       $validatedData = [
        'pesanan_id' => $id_pesanan,
        'nama_sepatu' => 'Vans' , 
        'jenis_cleaning' => 'Repair',
        'foto_sepatu' => 'gambar'
       ];

       DetailPesanan::create($validatedData);
       return back();
    }
}
