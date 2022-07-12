@extends('layouts.pri')

@section('title', 'Preferiti')

@section('style')
<link rel='stylesheet' href="{{ asset('css/favorite.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/favorite.js') }}" defer></script>
@endsection

@section('one')
<div >
  <h1>I TUOI PREFERITI: </h1>
 </div> 
 @endsection