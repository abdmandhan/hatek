@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    
@stop

@section('content')
    @include('layouts.message')

    <div class="container">
        <div class="row text-center">
            <div class="form-group">
                <h2><i class="fa fa-user">{{ Auth::user()->name }}</i></h2>
            </div>
        </div>
    </div>
    <table align="center">
        <tr>    
            <td colspan="3" align="center"><img src="{{ asset("img/".Auth::user()->photo)}}" alt="" srcset=""></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>{{ Auth::user()->nim }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td>:</td>
            <td>{{ Auth::user()->telp }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>:</td>
            <td>{{ Auth::user()->gender }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{ Auth::user()->status }}</td>
        </tr>
        <tr>
            <td>Instagram</td>
            <td>:</td>
            <td><a href="http://www.instagram.com/{{ Auth::user()->instagram }}">{{ Auth::user()->instagram }}</a></td>
        </tr>
        <tr>
            <td>Job</td>
            <td>:</td>
            <td>{{ Auth::user()->job }}</td>
        </tr>
        <tr>
            <td>Company</td>
            <td>:</td>
            <td>{{ Auth::user()->company }}</td>
        </tr>
        <tr>
            <td>Kajian</td>
            <td>:</td>
            <td>{{ Auth::user()->kajian }}</td>
        </tr>
        <tr>
            <td>Judul Tugas Akhir</td>
            <td>:</td>
            <td>{{ Auth::user()->title }}</td>
        </tr>
        <tr>
            <td>Verified</td>
            <td>:</td>
            <td>
                @if (Auth::user()->isVerified)
                    <span class="btn btn-success">Verified</span>
                @else
                    <span class="btn btn-danger">Not Verified</span>
                @endif
            </td>
        </tr>
        <tr>
            @if (!Auth::user()->isVerified)
                <td colspan="3" align="center"><a href="{{ route("verify")}}" class="btn btn-success">Verify</a></td>
            @endif
        </tr>
    </table>
@stop