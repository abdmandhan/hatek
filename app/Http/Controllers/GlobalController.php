<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kurikulum;
use App\Berita;
use Vinkla\Instagram\Instagram;

class GlobalController extends Controller
{
    public function index(){
        $berita = Berita::orderBy('created_at','desc')->take(3)->get();
        //return $berita;
        return view('welcome')->with('beritas',$berita);
    }
    public function kurikulum($semester){
        return view('pages/kurikulum')
        ->with('kurikulums',Kurikulum::where('semester',$semester)->get())
        ->with('semester',$semester);
    }
}
