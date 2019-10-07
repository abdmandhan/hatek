@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Change Password</h1>
@stop

@section('content')
    @include('layouts.message')
    <form action="{{ route('account.password') }}" method="POST">
        {!! csrf_field() !!}

        <div class="form-group has-feedback {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
            <input type="password" name="oldPassword" class="form-control"
                   placeholder="Old Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('oldPassword'))
                <span class="help-block">
                    <strong>{{ $errors->first('oldPassword') }}</strong>
                </span>
            @endif
        </div>
        <hr>
        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" class="form-control"
                   placeholder="New Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        @method('PUT')
        <button type="submit"class="btn btn-danger btn-block btn-flat">Change Password</button>
    </form>
@stop