@extends('adminlte::page')

@section('title', 'HA TEK')

@section('content_header')
    <h1>Webstite Himpunan Alumni Teknik Komputer</h1>
@stop

@section('content')

    @include('layouts.message') 
    <h4>
        <p>Website ini dibuat sebagai media untuk menampung data Alumni Teknik Komputer IPB</p>
    </h4>
    <br>
    <h2>Fitur Website</h2>
    <h3>1. Friends</h3>
    <h4><p>Dapat melihat data alumni (Nama, Email, Telephone, Instagram).</p></h4>
    <h3>2. Broadcast</h3>
    <h4><p>Dapat broadcast post ke email alumni yang sudah mendaftar di website.</p></h4>
    <h3>3. Post</h3>
    <h4><p>Dapat membuat post dengan 3 category <strong>(Event, Information dan Lowongan Kerja)</strong> .</p></h4>
    <br>
    <h2>Informasi Tambahan</h2>
    <h4>
        <p>Untuk menggunakan fitur website diatas, akun website harus sudah <strong>TERVERIFIKASI.</strong></p>
        <p>Untuk verifikasi akun, harus menggunakan <strong>Nama</strong> dan <strong>NIM</strong> sesuai <strong>KTM</strong>.</p>
        <p>Verifikasi akun dapat dilakukan dengan mengklik link berikut: <a href="{{ route('verify')}}">Verify Me!</a></p>
        <p>Kontak Admin: <strong>tekom@apps.ipb.ac.id</strong></p>
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