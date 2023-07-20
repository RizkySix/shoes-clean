<?php

namespace App\Http\Controllers;

use App\Models\JenisCleaning;
use App\Models\MarketShoes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MarketShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->session()->forget('pesanan_filled');
        $all_market = MarketShoes::where('pemilik_toko' , '!=' , null)
                            ->where('foto_toko' , '!=' , null)
                            ->with(['user'])->latest()->paginate(10)->withQueryString();


        if($request->search){
            $all_market = MarketShoes::orderByRaw("nama_toko like '%$request->search%' DESC")
                               ->where('pemilik_toko' , '!=' , null)
                                ->where('foto_toko' , '!=' , null)
                                ->with(['user'])->paginate(10)->withQueryString();
        }

        if($request->filter == 'terdekat'){
            
            $alamat_user = auth()->user()->alamat;
            $all_market = MarketShoes::orderByRaw("alamat like '%$alamat_user%' DESC")
                                ->where('pemilik_toko' , '!=' , null)
                                ->where('foto_toko' , '!=' , null)
                                ->with(['user'])->paginate(10)->withQueryString();
        }

        if($request->filter == 'rating'){
            
            $all_market = MarketShoes::orderBy("rating" , "DESC")                     
                            ->where('pemilik_toko' , '!=' , null)
                            ->where('foto_toko' , '!=' , null)->with(['user'])->paginate(10)->withQueryString();
        }
        return view('market.view_all_store' , [
            'title' => 'All Store',
            'markets' => $all_market,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nama_toko.min' => 'Buat nama toko dengan benar.',
            'alamat.min' => 'Silahkan masukkan alamat dengan lengkap.' , 
            'no_hp.min' => 'Masukkan no handphone yang benar.',
            'email_toko.email' => 'Alamat email tidak valid.'
        ];
        $validatedData = $request->validate([
            'slug_id' => 'nullable|unique:market_shoes',
            'nama_toko' => 'required|string|min:3', 
            'alamat' => 'required|string|min:8',
            'no_hp' => 'required|string|min:11',
            'email_toko' => 'required|email:dns'
        ] , $messages);

        $validatedData['slug_id'] = fake()->uuid() . mt_rand(1,1000);
        $validatedData['user_id'] = auth()->user()->id;

        User::where('id' , auth()->user()->id)->update(['status_toko' => true]);
        MarketShoes::create($validatedData);
        return redirect('/user-market-shoes/' . $validatedData['slug_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MarketShoes $market_shoe)
    {
      
        return view('market.show_store' , [
            'title' => 'Detail Toko',
            'market' => $market_shoe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MarketShoes $market_shoe)
    {   
        if(!session('on_market')){
            return back();
        }

        return view('market.edit_market' , [
            'title' => 'Lengkapi Profile Toko',
            'market' => $market_shoe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MarketShoes $market_shoe)
    {

        $messages = [
            'nama_toko.min' => 'Buat nama toko dengan benar.',
            'alamat.min' => 'Silahkan masukkan alamat dengan lengkap.' , 
            'no_hp.min' => 'Masukkan no handphone yang benar.',
            'email_toko.email' => 'Alamat email tidak valid.',
            'pemilik_toko.min' => 'Masukkan nama pemilik dengan benar.',
            'jam_buka.required' => 'Jam buka harus diisi.',
            'jam_tutup.required' => 'Jam tutup harus diisi.',
            'foto_toko.image' => 'Format harus berupa gambar.',
            'foto_toko.max' => 'Gambar harus dibawah 5mb.',
        ];

        $rule = [
            'nama_toko' => 'required|string|min:3', 
            'alamat' => 'required|string|min:8',
            'no_hp' => 'required|string|min:11',
            'email_toko' => 'required|email:dns',
            'pemilik_toko' => 'required|string|min:3',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'instagram' => 'nullable|string',
            'whatssapp' => 'nullable|string',

        ];

        if($market_shoe->foto_toko) {
            $rule['foto_toko'] = 'nullable|image|file|max:5120';
        } else {
            $rule['foto_toko'] = 'required|image|file|max:5120';
        }

        $validatedData = $request->validate($rule , $messages); //  bisa seperti ini atau menggunakan sometimes(), bisa dilihat penggunaan nya pada documentaion laravel validation
    
        //input gambar
        if($request->file('foto_toko')){
            if($market_shoe->foto_toko){
                Storage::delete($market_shoe->foto_toko);
            }

            $validatedData['foto_toko'] = $request->file('foto_toko')->store('Markets_Profile');
        }

        MarketShoes::where('id'  , $market_shoe->id)->update($validatedData);
        return redirect('/user-market-shoes/' . $market_shoe->slug_id)->with('success' , 'Profile toko berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarketShoes $market_shoe)
    {
        //route masih belum dipakai
        return back();
    }
}
