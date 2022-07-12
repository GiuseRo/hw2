@extends('layouts.guest')

@section('title', 'Registrazione in corso')

@section('style')
<link rel='stylesheet' href="{{ asset('css/register.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/register.js') }}" defer></script>
<script type="text/javascript">
    const REGISTER_ROUTE = "{{route('register')}}";
</script>
@endsection

@section('contenuto')
<h1>REGISTRATI AL SITO</h1>
    <main class=registrazione>
    <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('register')}}">
      @csrf
      <label class='email'>E-mail: <input type='text' name='email'value="{{ old('email' ) }}"autocomplete="email"></label>
      <label class='name'>Nome : <input type='text' name='name'value="{{ old('name') }}"></label>
      <label class='surname'>Cognome: <input type='text' name='surname'value="{{ old('surname') }}"></label>
      <label class='username'>Nome Utente: <input type='text' name='username'value="{{ old('username') }}"></label>
      <label class='password'>Password: <input type='password' name='password'></label>
      <label class='confirm_password'>Conferma Password: <input type='password' name='confirm_password'></label>
      <label>&nbsp;<input type='submit'value="registrati" id='submit'></label>
      <a href="{{ route('login') }}"> hai un accont? accedi!</a>
    </form> 
    </main>
     
         <div class="errorec">
    <div><span class="erroreemail"></span></div>
    <div><span class="errorename"></span> </div>
    <div><span class="erroresurname" ></span></div>
    <div><span class="erroreusername"></span></div>
    <div><span class="errorepassword"></span></div>
    <div><span class="erroreconfirm"></span></div>
        </div>
@endsection
