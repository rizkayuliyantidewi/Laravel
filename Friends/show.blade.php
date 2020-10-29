@extends('layouts.app')

@section('title' , 'cobaaaaaa')

@section ('content')
<div class="card">
<div class="card-body">
   <h3>Nama teman : {{ $friend['nama']}} </h3>
   <h3>No telp teman : {{ $friend['no_tlp']}} </h3>
   <h3>Alamat teman : {{ $friend['alamat']}} </h3>
  
@endsection
