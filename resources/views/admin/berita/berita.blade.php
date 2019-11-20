<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Berita - <a href="{{ route('berita.create')}}" class="btn btn-primary">Tambah Berita</a></h1>
@stop

@section('content')
<div class="container-fluid">
    @include('layouts.message') 
    <div class="row">
        <table id="example" class="table table-striped table-bordered table-hover table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $b)
                    <tr>
                        <td width="5%">{{ $b->id }}</td>
                        <td width="20%">{{ $b->title }}</td>
                        <td width="20%">{!! $b->body !!}</td>
                        <td width="20%" align="center"><img src="{{ url($b->image) }}" alt="" srcset="" width="75%%"></td>
                        <td width="20%" class="{{ $b->is_show ? 'bg-success':'bg-danger'}}">{{ $b->is_show ? 'Show' : 'Hidden' }}</td>
                        <td width="15%">
                            <div class="dropdown">
                                <form action="{{ route('berita.destroy',$b->id) }}" method="POST" id="my_form{{ $b->id }}">
                                <button class="btn btn-primary dropdown-toggle fa fa-cogs" type="button" data-toggle="dropdown">
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('berita.edit',$b->id) }}">Edit</a>
                                    </li>
                                    <li>
                                        <a href="javascript:{}" onclick="document.getElementById('my_form{{ $b->id }}').submit();">Delete</a>
                                    </li>
                                    <li><a href="{{ route('status',$b->id)}}">{{ $b->is_show ? 'Hidden' : 'Show'}}</a></li>
                                </ul>
                                @csrf
                                @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>  
</div>
@stop

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
