<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function liked($id){
        if(Like::where('user_id',Auth::user()->id)->where('post_id',$id)->first()){
            return redirect('home')->with('error','Post Sudah Anda Like');
        }else{
            $like = new Like();
    
            $like->user_id = Auth::user()->id;
            $like->post_id = $id;
            $like->isLiked = 1;
            $like->save();
            
            return redirect('home')->with('success','Berhasil Like Post');
        }
        
    }

    
}
