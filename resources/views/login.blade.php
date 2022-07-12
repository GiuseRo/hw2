@extends('layouts.guest')

@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endsection

@section('contenuto')
<h1>ACCESSO AL SITO</h1>
    <main class=login>
    <form method="post" action="{{ route('login') }}">
      @csrf
      <label>Nome Utente: <input type='text' name='username' value="{{ old('username') }}"></label>
      <label>Password: <input type='password' name='password'></label>
      <label>&nbsp;<input type='submit'value="entra"></label>
     
      <a href="{{ route('register') }}">non hai un accont? crealo!</a>
    </form>
    </main>

@endsection