@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Create Posts</h1>
@stop

@section('content')
    <form action="{{ route('post.store') }}" method="post">
        {!! csrf_field() !!}

        <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
            <input type="title" name="title" class="form-control" value="{{ old('title') }}"
                   placeholder="Title">
            <span class="fa fa-paperclip form-control-feedback"></span>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('category') ? 'has-error' : '' }}">
            <select name="category" class="form-control" value="{{ old('category') }}">
                <option value="" disabled selected>Category</option>
                <option value="Event" @if (old('category') == "Event") {{ 'selected' }} @endif>Event</option>
                <option value="Information" @if (old('category') == "Information") {{ 'selected' }} @endif>Information</option>
                <option value="Lowongan Kerja" @if (old('category') == "Lowongan Kerja") {{ 'selected' }} @endif>Lowongan Kerja</option>
            </select>
            <span class="fa fa-bookmark form-control-feedback"></span>
            @if ($errors->has('category'))
                <span class="help-block">
                    <strong>{{ $errors->first('category') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('body') ? 'has-error' : '' }}">
            <textarea type="text" name="body" class="form-control" value="{{ old('body') }}"
                   placeholder="Write Here !" rows="10">{{ old('body') }}</textarea>
            <span class="fa fa-keyboard form-control-feedback"></span>
            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit"
                class="btn btn-primary btn-block btn-flat"
        >Create</button>
    </form>
@stop