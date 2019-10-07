@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Friends</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($friends as $friend)
            @if ($friend->isOnline())
                <div class="col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon"><img src="{{ asset('img/'.$friend->photo)}}" alt="" srcset="" width="80%"></span>
                        <div class="info-box-content  dropdown">
                            <span class="info-box-text"><i class="fa fa-address-book"></i> {{ $friend->name }}</span>
                            <span class="info-box-text"><i class="fa fa-envelope"></i> {{ $friend->email }}</span>
                            <span class="info-box-text"><i class="fa fa-graduation-cap"></i> {{ $friend->angkatan }}</span>
                            <span class="info-box-text">
                                <i class="fa fa-instagram"></i> 
                                <a href="http://www.instagram.com/{{ $friend->instagram }}" target="_blank">{{ $friend->instagram }}</a>
                                <button class="fa fa-ellipsis-v" type="button" data-toggle="modal" style="float:right; background-color: aqua;" data-target="#myModal{{ $friend->id }}"></button>
                            </span>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $friend->id }}" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ $friend->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-phone"> {{ $friend->telp }}</i> <br>
                                        <i class="fa fa-briefcase"> {{ $friend->job }}</i> <br> 
                                        <i class="fa fa-building"> {{ $friend->company }}</i> <br>
                                        <i class="fa fa-graduation-cap"> {{ $friend->kajian }}</i> <br>
                                        <i class="fa fa-book"> {{ $friend->title }}</i>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            @endif     
        @endforeach
    </div>
</div>
    
    
    
@stop