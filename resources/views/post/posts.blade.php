@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')
    @include('layouts.message')
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $post->title }} - <span class="label label-primary">{{ $post->category }}</span></h3>
                        <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        @if ($post->user_id == Auth::user()->id)
                            <form action="{{ route('post.broadcast') }}" method="POST">
                                <input type="text" name="postId" value="{{ $post->id }}" hidden>
                                <input type="text" name="userId" value="{{ $post->user->id }}" hidden>
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger btn-block btn-flat">Broadcast this post</button>
                            </form>
                        @endif
                        
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {{ $post->body }}
                        <br>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        Written on {{ $post->created_at->format('Y-m-d') }}, Posted by {{ $post->user->name }} 
                        @if ($post->user_id == Auth::user()->id)
                            <div style="float:right;">
                                    
                                <form action="post/{{ $post->id }}" method="POST">
                                    <a href="post/{{ $post->id }}"><button class="btn fa fa-edit" type="button"></button></a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn fa fa-trash" onclick="return confirm('Are you sure?')"></button>
                                </form>
                            </div>
                            @endif
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
        @endforeach       
    </div>
@stop