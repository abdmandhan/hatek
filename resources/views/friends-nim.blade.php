@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    
@stop

@section('content')
    <style>
        .form-group{
            margin-bottom: 0px;
        }
    </style>
    @include('layouts.message')

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-2">
                <img src="{{ asset("img/".$user->photo)}}" alt="" srcset="" >
            </div>
            <div class="col-md-10">
                <h2 style="margin-top:0px;">{{ $user->name }}</h2>
                <h3>{{ $user->nim }}</h3>
                @if ($user->isVerified)
                    <span class="btn btn-success">Verified</span>
                @else
                    <span class="btn btn-danger">Not Verified</span>
                @endif
            </div>
        </div>
        <br>
        <div class="row">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Biodata</h3>
                    <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Telephone:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->telp }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Gender:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->gender }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Status:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->status }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Instagram:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->instagram }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Job:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->job }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Company:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->company }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Kajian:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->kajian }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Tugas Akhir:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $user->title }}</p>
                            </div>
                        </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop