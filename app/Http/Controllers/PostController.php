<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\UserValidation;
use App\Post;
use Illuminate\Support\Facades\Hash;
use App\Mail\Broadcast;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verify');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.posts')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string'],
            'category' => ['required', 'string', 'in:Event,Information,Lowongan Kerja'],
        ]);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category = $request->input('category');
        $post->save();

        return redirect('home')->with('success','Berhasil membuat post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        if(Auth::user()->id == $post->user->id){
            return view('post.edit')->with('success','Berhasil menghapus Post')->with('post',$post);
        }else{
            return redirect()->back()->with('error','Gagal mengambil Post');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request,[
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string'],
            'category' => ['required', 'string', 'in:Event,Information,Lowongan Kerja'],
        ]);

        $post = Post::find($id);
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category = $request->input('category');
        $post->save();

        return redirect('home')->with('success','Berhasil update post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if(Auth::user()->id == $post->user->id){
            $post->delete();
            return redirect()->back()->with('success','Berhasil menghapus Post');
        }else{
            return redirect()->back()->with('error','Gagal menghapus Post');
        }
        
        
        
        
    }

    public function broadcast(Request $request){
        
        $check = Post::find($request->input('postId'));
        if(Auth::user()->id == $check->user->id){
            if($check->isBroadcast){
                return redirect()->back()->with('error','Gagal broadcast Post, Post sudah di broadcast');
            }else{
                $posts = Post::all();
                $user = User::find($request->input('userId'));
                $post = Post::find($request->input('postId'));
                
                $users = User::all();
                
                for ($i=0; $i < sizeof($users) ; $i++) { 
                    $emails[$i] = $users[$i]->email;
                }

                Mail::to($emails)->send(new Broadcast($user->email, $user->name, $post->title, $post->body, $post->category));

                $post->setBroadcast();
                return redirect()->back()->with('success', 'Broadcast success')->with('posts',$posts);
                }
        }else{
            return redirect()->back()->with('error','Gagal broadcast Post');
        }
    }
}
