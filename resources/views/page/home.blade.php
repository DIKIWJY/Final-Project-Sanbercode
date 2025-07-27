@extends('layouts.master')
@section('title')
    Halaman Dashboard
@endsection()
@section('h2')
    Dashboard
@endsection
@section('content')
    <h1>Selamat Datang {{ $firstname . ' ' . $lastname }}</h1>
    <h3>Terima kasih telah bergabung di SanberBook. Sosial Media kita bersama!</h3>
@endsection
