@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content')
<div class="container-fluid">
    @include('layouts.message') 
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Comment</h2>
                <div class="box box-primary"><!-- /.box -->
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-1 text-center">
                                <img src="{{ asset("img/".$post->user->photo)}}" alt="" srcset="" class="img-circle" height="50px" >
                            </div>
                            <div class="col-md-4">
                                {{ $post->user->name }} <br>
                                {{ $post->title }} <br>
                                <span class="<?php if($post->category == "Event") echo "bg-warning"; elseif($post->category == "Information") echo "bg-info"; else echo "bg-danger"; ?>">{{ $post->category }}</span>
                            </div>
                        </div>   
                        <div class="box-tools pull-right">
                            <form action="post/{{ $post->id }}" method="POST">
                                {{ $post->created_at->format('Y-m-d') }}
                                @if ($post->user_id == Auth::user()->id)
                                    <a href="post/{{ $post->id }}" class="fa fa-edit btn btn-box-tool"></a> 
                                    @csrf
                                    @method('delete') 
                                    <button class="btn btn-box-tool" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash" ></i></button>   
                                @endif 
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </form>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="height: 100%;">
                        
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                {!!$post->body!!}
                            </div>
                        </div>
                        <div class="row text-center">
                            <hr style="margin-left: 5px; margin-right: 5px; margin:5px">
                            <div class="col-md-4"><a href="{{ url("like/".$post->id)}}"><i class="far fa-thumbs-up"></i> {{ $post->likes->count() }} Suka</a></div>
                            <div class="col-md-4"><button class="btn btn-box-tool" onclick="myFunction()"><i class="far fa-comment-alt"></i> {{ $post->comments->count() }} Comment</button></div>
                            @if ($post->user_id == Auth::user()->id)
                                <form action="{{ route('post.broadcast') }}" method="POST" class="col-md-4" id="formShare">
                                    <input type="text" name="postId" value="{{ $post->id }}" hidden>
                                    <input type="text" name="userId" value="{{ $post->user->id }}" hidden>
                                    {!! csrf_field() !!}
                                    <a href="javascript:;" type="submit" onclick="document.getElementById('formShare').submit();"><i class="far fa-envelope"></i> Share</a>
                                </form>
                            @endif
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
        </div>
    </div>

    <div class="row" id="comments" style="display: none;">
        <div class="col-md-2"></div>
        <div class="col-md-10">
                <div class="box box-primary"><!-- /.box -->
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-1 text-center">
                                <img src="{{ asset("img/".Auth::user()->photo)}}" alt="" srcset="" class="img-circle" height="50px" >
                            </div>
                            <div class="col-md-4">
                                {{ Auth::user()->name }} <br>
                            </div>
                        </div>   
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="height: 100%;">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route("comment.store")}}" method="post">
                                    {!! csrf_field() !!}
                                    <input type="text" name="postId" hidden value="{{ $post->id }}">
                                    <textarea id="article-ckeditor" type="text" name="body" class="form-control"
                                            placeholder="Write Here !" rows="10"></textarea>
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
        </div>
    </div>
    
    @foreach ($comments as $comment)
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                    <div class="box box-primary"><!-- /.box -->
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img src="{{ asset("img/".$comment->user->photo)}}" alt="" srcset="" class="img-circle" height="50px" >
                                </div>
                                <div class="col-md-4">
                                    {{ $comment->user->name }} <br>
                                </div>
                            </div>   
                            <div class="box-tools pull-right">
                                <form action="{{ $comment->id }}" method="POST">
                                    {{ $comment->created_at->format('Y-m-d') }}
                                    @if ($comment->user_id == Auth::user()->id)
                                        @csrf
                                        @method('delete') 
                                        <button class="btn btn-box-tool" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash" ></i></button>   
                                    @endif 
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </form>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="height: 100%;">
                            
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    {!!$comment->body!!}
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
            </div>
        </div>
    @endforeach
</div>

<script>
    function myFunction() {
        var x = document.getElementById("comments");
        if (x.style.display === "none") {
        x.style.display = "block";
        } else {
        x.style.display = "none";
        }
    }
</script>
@stop
