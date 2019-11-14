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
                   placeholder="{{ trans('adminlte::adminlte.full_name') }}" {{ Auth::user()->is_verified ? "disabled" : ""}}>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('nim') ? 'has-error' : '' }}">
            <input type="text" name="nim" class="form-control" value="{{ Auth::user()->nim }}"
                   placeholder="NIM" {{ Auth::user()->is_verified ? "disabled" : ""}}>
            <span class="fa fa-address-card form-control-feedback"></span>
            @if ($errors->has('nim'))
                <span class="help-block">
                    <strong>{{ $errors->first('nim') }}</strong>
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

        @method('PUT')
        <button type="submit"class="btn btn-primary btn-block btn-flat">Update</button>
    </form>
@stop