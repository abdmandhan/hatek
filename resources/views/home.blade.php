@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content')

<div class="container-fluid">
    @include('layouts.message') 
    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Post</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="height: 100%;">
                        @foreach ($posts as $post)
                            <div class="col-md-12">
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
                                                <button type="submit" class="btn btn-info btn-block btn-flat" onclick="return confirm('Are you sure?')">Broadcast this post</button>
                                            </form>
                                        @endif
                                        
                                        </div><!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        {!!$post->body!!}
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
                </div><!-- /.box-body -->
            </div><!-- /.box -->
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
            <div class="row">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Instagram Teknik Komputer</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pre-scrollable" style="height: 250px">
                        @for ($i = 0; $i < sizeof($instagrams); $i++)
                            <img src="{{ $instagrams[$i]->images->thumbnail->url }}" alt="" srcset="">
                            {{-- <img src="{{ $instagrams[$i]->images->standard_resolution->url }}" alt="" width="{{ $instagrams[$i]->images->standard_resolution->width }}" height="{{ $instagrams[$i]->images->standard_resolution->height }}">  --}}
                        @endfor
                    </div><!-- /.box-body -->
                </div><!-- /.box -->            
            </div>
        </div>
    </div>
    
</div>
@stop
