@extends('layout.main')

@section('container')
    <div>
        <h2>Nama Lengkap : {{ $nama_lengkap }}</h2>
        <h2>Email : {{ $email }}</h2>
        <h2>Jenis Kelamin : {{ $jenis_kelamin }}</h2>
    </div>
@endsection