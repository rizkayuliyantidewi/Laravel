@extends('layouts.app')

@section('title', 'Urutan')

@section('content')

@foreach ($numbers as $numbers)
    <h1>Urutan ke - {{ $numbers['ke']}}</h1>
    <h3>Nomor ke - {{ $numbers['nomor']}}</h3>
@endforeach

@endsection