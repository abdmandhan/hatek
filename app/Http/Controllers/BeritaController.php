<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verify');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = Berita::all();
        return view('admin/berita/berita')->with('beritas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/berita/berita-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'file' => 'image|mimes:jpeg,png,jpg|max:10000|required',
        ]);

        $file = $request->file('file');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $tujuan_upload = 'uploads/images-berita';
        $file->move($tujuan_upload, $imageName);

        $data = new Berita();
        $data->title = $request->input('title');
        $data->body = $request->input('body');
        $data->image = $tujuan_upload . '/' . $imageName;
        $data->is_show = 1;
        $data->save();

        return redirect('admin/berita/berita')->with('success', 'Berhasil membuat berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Berita::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus berita');
    }

    public function status($id)
    {
        $data = Berita::find($id);
        $data->is_show ? $data->is_show = 0 : $data->is_show = 1;
        $data->update();
        return redirect()->back()->with('success', 'Berhasil merubah status berita');
    }
}
