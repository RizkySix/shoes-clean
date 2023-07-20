<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewJenisSepatuAndCleaningController extends Controller
{
    public function view(){
        return view('jenis_jenis.clean_sepatu' , [
            'title' => 'Jenis Clean And Shoes'
        ]);
    }
}
