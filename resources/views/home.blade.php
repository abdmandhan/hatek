@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content')
<div class="container-fluid">
    @include('layouts.message') 
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('post.create') }}" class="btn btn-warning">Create Post</a>
            <h2 class="text-center">Forum</h2>
                @foreach ($posts as $post)
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
                                <div class="col-md-4"><a href="{{ url("comment/".$post->id)}}"><i class="far fa-comment-alt"></i> {{ $post->comments->count() }} Comment</a></div>
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
                @endforeach  
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Online User</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pre-scrollable" style="height: 150px">
                        @foreach ($friends as $friend)
                            @if ($friend->isOnline())
                                <a href="{{ url('friends/'.$friend->nim) }}">{{ $friend->name }} '{{ $friend->angkatan }}</a>
                                <br>
                            @endif
                        @endforeach
                    </div><!-- /.box-body -->
                </div><!-- /.box -->            
            </div>
        </div>
    </div>
    
</div>
@stop
