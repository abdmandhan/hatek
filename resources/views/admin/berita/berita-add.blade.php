@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Create Berita</h1>
@stop

@section('content')
    <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
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

        <div class="form-group has-feedback {{ $errors->has('body') ? 'has-error' : '' }}">
            <textarea id="article-ckeditor" type="text" name="body" class="form-control" value="{{ old('body') }}"
                   placeholder="Write Here !" rows="10">{{ old('body') }}</textarea>
            <span class="fa fa-keyboard form-control-feedback"></span>
            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('file') ? 'has-error' : '' }}">
            <input type="file" name="file" class="form-control" value="{{ old('file') }}">
            <span class="fa fa-file form-control-feedback"></span>
            @if ($errors->has('file'))
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif
        </div>        

        <button type="submit"
                class="btn btn-primary btn-block btn-flat"
        >Create</button>
    </form>
@stop