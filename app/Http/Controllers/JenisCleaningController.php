<?php

namespace App\Http\Controllers;

use App\Models\JenisCleaning;
use App\Models\MarketShoes;
use Illuminate\Http\Request;

class JenisCleaningController extends Controller
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
        return view('market_cleaning.create_view' , [
            'title' => 'Buat Cleanings'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nama_cleaning.min' => 'Nama cleaning minimal 5 karakter',
        ];
        $validatedData = $request->validate([
            'nama_cleaning' => 'required|string|min:5',
            'category_cleaning' => 'required|string|min:3',
            'harga' => 'required|string'
        ] , $messages);

        $getMarket = MarketShoes::where('slug_id' , $request->rasomon_blury)->pluck('id');
        foreach($getMarket as $id)
        {
            $id_market = $id;
        }

        //rubah format harga
        $validatedData['harga'] = explode('.' , $validatedData['harga']);
        $validatedData['harga'] = implode('' , $validatedData['harga']);

        $validatedData['market_shoe_id'] = $id_market;

        JenisCleaning::create($validatedData);
        return back()->with('success' , 'Cleaning berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisCleaning $jenis_cleaning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisCleaning $jenis_cleaning)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisCleaning $jenis_cleaning)
    {
        session()->flash('errors_format' , $jenis_cleaning->id);

        $messages = [
            'nama_cleaning.min' => 'Nama cleaning minimal 5 karakter',
        ];
        $validatedData = $request->validate([
            'nama_cleaning' => 'required|string|min:5',
            'category_cleaning' => 'required|string|min:3',
            'harga' => 'required|string'
        ] , $messages);

         //rubah format harga
         $validatedData['harga'] = explode('.' , $validatedData['harga']);
         $validatedData['harga'] = implode('' , $validatedData['harga']);

         JenisCleaning::where('id' , $jenis_cleaning->id)->update($validatedData);
         $request->session()->forget('errors_format');
         return back()->with('success' , 'Cleaning berhasil terupdate');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisCleaning $jenis_cleaning)
    {
        JenisCleaning::destroy($jenis_cleaning->id);
        return back()->with('success' , 'Cleaning dihapus');
    }


}
