<?php

namespace App\Http\Controllers;

use App\Models\DashboardContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardContentController extends Controller
{
    
    public function content($id , Request $request){
        $gos = DashboardContent::where('id' , $id)->get();
      

        foreach($gos as $gs){};
        $validatedData = $request->validate([
            'judul1' => 'nullable|string',
            'deskripsi1' => 'nullable|string|min:20',
            'foto_konten1' => 'nullable|image|file|max:5120',

            'judul2' => 'nullable|string',
            'deskripsi2' => 'nullable|string|min:20',
            'foto_konten2' => 'nullable|image|file|max:5120',

            'judul3' => 'nullable|string',
            'deskripsi3' => 'nullable|string|min:20',
            'foto_konten3' => 'nullable|image|file|max:5120',

            'judul4' => 'nullable|string',
            'deskripsi4' => 'nullable|string|min:20',
            'foto_konten4' => 'nullable|image|file|max:5120',
        ]);

        if($request->judul1){
           if($request->file('foto_konten1')){
            if($gs->foto_konten1){
                Storage::delete($gs->foto_konten1);
            }
            $validatedData['foto_konten1'] = $request->file('foto_konten1')->store('konten-images');
           }else{
            $validatedData['foto_konten1'] = $gs->foto_konten1;
           }

            DashboardContent::where('id'  , $id)->update(['judul1' => $validatedData['judul1'] , 'deskripsi1' => $validatedData['deskripsi1'] , 'foto_konten1' => $validatedData['foto_konten1']]);
            return back();
        }

        if($request->judul2){
            if($request->file('foto_konten2')){
             if($gs->foto_konten2){
                 Storage::delete($gs->foto_konten2);
             }
             $validatedData['foto_konten2'] = $request->file('foto_konten2')->store('konten-images');
            }else{
                $validatedData['foto_konten2'] = $gs->foto_konten2;
            }
 
             DashboardContent::where('id'  , $id)->update(['judul2' => $validatedData['judul2'] , 'deskripsi2' => $validatedData['deskripsi2'] , 'foto_konten2' => $validatedData['foto_konten2']]);
             return back();
         }


         if($request->judul3){
            if($request->file('foto_konten3')){
             if($gs->foto_konten3){
                 Storage::delete($gs->foto_konten3);
             }
             $validatedData['foto_konten3'] = $request->file('foto_konten3')->store('konten-images');
            }else{
                $validatedData['foto_konten3'] = $gs->foto_konten3;
            }
 
             DashboardContent::where('id'  , $id)->update(['judul3' => $validatedData['judul3'] , 'deskripsi3' => $validatedData['deskripsi3'] , 'foto_konten3' => $validatedData['foto_konten3']]);
             return back();
         }



         if($request->judul4){
            if($request->file('foto_konten4')){
             if($gs->foto_konten4){
                 Storage::delete($gs->foto_konten4);
             }
             $validatedData['foto_konten4'] = $request->file('foto_konten4')->store('konten-images');
            }else{
                $validatedData['foto_konten4'] = $gs->foto_konten4;
            }
 
             DashboardContent::where('id'  , $id)->update(['judul4' => $validatedData['judul4'] , 'deskripsi4' => $validatedData['deskripsi4'] , 'foto_konten4' => $validatedData['foto_konten4']]);
             return back();
         }
    }

}
