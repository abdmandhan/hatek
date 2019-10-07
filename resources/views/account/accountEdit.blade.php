@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Edit Profile</h1>
@stop

@section('content')
    @include('layouts.message')
    <form action="{{ route('account.update') }}" method="POST">
        {!! csrf_field() !!}

        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}"
                    placeholder="{{ trans('adminlte::adminlte.email') }}" disabled>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                   placeholder="{{ trans('adminlte::adminlte.full_name') }}" {{ Auth::user()->isVerified ? "disabled" : ""}}>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('nim') ? 'has-error' : '' }}">
            <input type="text" name="nim" class="form-control" value="{{ Auth::user()->nim }}"
                   placeholder="NIM" {{ Auth::user()->isVerified ? "disabled" : ""}}>
            <span class="fa fa-address-card form-control-feedback"></span>
            @if ($errors->has('nim'))
                <span class="help-block">
                    <strong>{{ $errors->first('nim') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('telp') ? 'has-error' : '' }}">
            <input type="number" name="telp" class="form-control" value="{{ Auth::user()->telp }}"
                   placeholder="No Telphone">
            <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
            @if ($errors->has('telp'))
                <span class="help-block">
                    <strong>{{ $errors->first('telp') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
                <select name="gender" class="form-control" value="{{ old('gender') }}">
                    <option value="" disabled selected>Gender</option>
                    <option value="Male" @if (Auth::user()->gender == "Male") {{ 'selected' }} @endif>Male</option>
                    <option value="Female" @if (Auth::user()->gender == "Female") {{ 'selected' }} @endif>Female</option>
                </select>
                <span class="fa fa-venus-mars form-control-feedback"></span>
                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>

        <div class="form-group has-feedback {{ $errors->has('status') ? 'has-error' : '' }}">
            <select name="status" class="form-control" value="{{ old('status') }}">
                <option value="" disabled selected>Status</option>
                <option value="Mahasiswa" @if (Auth::user()->status == "Mahasiswa") {{ 'selected' }} @endif>Mahasiswa</option>
                <option value="Alumni" @if (Auth::user()->status == "Alumni") {{ 'selected' }} @endif>Alumni</option>
            </select>
            <span class="glyphicon glyphicon-education form-control-feedback"></span>
            @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('instagram') ? 'has-error' : '' }}">
            <input type="text" name="instagram" class="form-control" value="{{ Auth::user()->instagram }}"
                   placeholder="Instagram">
            <span class="fa fa-instagram form-control-feedback"></span>
            @if ($errors->has('instagram'))
                <span class="help-block">
                    <strong>{{ $errors->first('instagram') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('job') ? 'has-error' : '' }}">
            <input type="text" name="job" class="form-control" value="{{ Auth::user()->job }}"
                   placeholder="Job">
            <span class="fa fa-briefcase form-control-feedback"></span>
            @if ($errors->has('job'))
                <span class="help-block">
                    <strong>{{ $errors->first('job') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('company') ? 'has-error' : '' }}">
            <input type="text" name="company" class="form-control" value="{{ Auth::user()->company }}"
                   placeholder="Company">
            <span class="fa fa-building form-control-feedback"></span>
            @if ($errors->has('company'))
                <span class="help-block">
                    <strong>{{ $errors->first('company') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('kajian') ? 'has-error' : '' }}">
            <select name="kajian" class="form-control" value="{{ Auth::user()->kajian }}">
                <option value="" disabled selected>Kajian</option>
                <option value="Hardware" @if (Auth::user()->kajian == "Hardware") {{ 'selected' }} @endif>Hardware</option>
                <option value="Jaringan" @if (Auth::user()->kajian == "Jaringan") {{ 'selected' }} @endif>Jaringan</option>
                <option value="Multimedia" @if (Auth::user()->kajian == "Multimedia") {{ 'selected' }} @endif>Multimedia</option>
            </select>
            <span class="glyphicon glyphicon-education form-control-feedback"></span>
            @if ($errors->has('kajian'))
                <span class="help-block">
                    <strong>{{ $errors->first('kajian') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
            <textarea type="text" name="title" class="form-control" value="{{ Auth::user()->title }}"
                   placeholder="Judul Tugas Akhir">{{ Auth::user()->title }}</textarea>
            <span class="fa fa-book form-control-feedback"></span>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        @method('PUT')
        <button type="submit"class="btn btn-primary btn-block btn-flat">Update</button>
    </form>
@stop