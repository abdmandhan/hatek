<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verify');
        $this->middleware('admin');
    }

    public function berita()
    {
        $data = Berita::all();
        return view('admin/berita')->with('beritas',$data);
    }

    public function kurikulum()
    {
        return view('admin/kurikulum');
    }

    public function dosen()
    {
        return view('admin/dosen');
    }

    public function kesan()
    {
        return view('admin/kesan');
    }

    public function project()
    {
        return view('admin/project');
    }
}
