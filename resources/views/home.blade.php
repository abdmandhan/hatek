@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Website Himpunan Alumni Teknik Komputer</h1>
    
@stop

@section('content')

    
    @for ($i = 0; $i < sizeof($instagrams); $i++)
        <img src="{{ $instagrams[$i]->images->thumbnail->url }}" alt="">
    @endfor


    @include('layouts.message')
    <h2>Tentang Website</h2>
    @foreach ($users as $user)
        @if($user->isOnline())
            {{ $user->name }} <br>
        @endif
    @endforeach

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>

    <br>
    <hr>
    <h4>
        <p>Website ini dibuat sebagai media untuk menampung data Alumni Teknik Komputer IPB</p>
    </h4>
    <br>
    <h2>Fitur Website</h2>
    <h3>1. Friends</h3>
    <h4><p>Dapat melihat data alumni (Nama, Email, Telephone, Instagram).</p></h4>
    <h3>2. Send Mail</h3>
    <h4><p>Dapat mengirim email ke alumni yang sudah mendaftar di website.</p></h4>
    <h3>3. Event</h3>
    <h4><p>Dapat memberi informasi terkait seminar atau event.</p></h4>
    <h3>4. Lowongan Kerja</h3>
    <h4><p>Dapat membuat lowongan pekerjaan.</p></h4>
    <h3>5. Information</h3>
    <h4><p>Dapat membuat informasi terkait mahasiswa, alumni atau dosen Teknik Komputer IPB.</p></h4>
    <br>
    <h2>Informasi Tambahan</h2>
    <h4>
        <p>Untuk menggunakan fitur website diatas, akun website harus sudah <strong>TERVERIFIKASI.</strong></p>
        <p>Untuk verifikasi akun, harus menggunakan <strong>Nama</strong> dan <strong>NIM</strong> sesuai <strong>KTM</strong>.</p>
        <p>Verifikasi akun dapat dilakukan dengan mengklik link berikut: <a href="{{ route('verify')}}">Verify Me!</a></p>
        <p>Kontak Admin: <strong>hatekipb@gmail.com</strong></p>
    </h4>
@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'home/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush