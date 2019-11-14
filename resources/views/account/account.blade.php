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
                <img src="{{ asset("img/".Auth::user()->photo)}}" alt="" srcset="" >
            </div>
            <div class="col-md-10">
                <h2 style="margin-top:0px;">{{ Auth::user()->name }}</h2>
                <h3>{{ Auth::user()->nim }}</h3>
                @if (Auth::user()->is_verified)
                    <a href="{{ route('verify')}}" class="btn btn-success">Verified</a>
                @else
                    <a href="{{ route('verify')}}" class="btn btn-danger">Not Verified</a>
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
                    <a href="{{ route('account.edit')}}" class="label label-danger">Edit</a>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Gender:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ Auth::user()->gender }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Status:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ Auth::user()->is_mahasiswa ? 'Mahasiswa' : 'Alumni' }}</p>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop