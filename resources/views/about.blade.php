@extends('layouts.main')

@section('container')
    <h2>Halaman About</h2>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/asd.png" width="200" class="img-thumbnail rounded-circle">
@endsection
