<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    @yield('style')
    @yield('script')
    
</head>

<header class='ben'data-user="{{$user['username']}}"> 
        <h1>Benvenuto  <!-- farsi tornare username dell'utente connesso -->{{$user['username'] }} </h1>
        <h2>Social-Ball</h1>
    </header>

<body>
    <header>
            <nav>
                <div id="nav">
                </div>

                <div class="l_nav">
                    <a href="{{ route('home') }}" >Home</a>
                    
                    <a href="{{ route('logout') }}">Logout</a><br><br>
                </div>
                @yield('one')
            </nav>
    </header>   
                <main class="fixed">
            <section id="profile" >
                <div class="name">
                    Profilo Loggato: <br>
                    nome: {{$user['name'] }} <br>
                   cognome:  {{$user['surname'] }} 
                </div>
                <div class="username">
                    username:  {{ '@'.$user['username'] }} 
                </div>
                    <div class="stats" >
                        <br>
                        <a href="{{ route('preferito') }}"><span class="count">Preferiti:
                        {{ $user['npreferiti'] }}</span></a>
                        
                    </div>
                     
                    <p><a  href="{{ route('logout') }}">esci dal sito</a></p>
                   

            </section> 
    </main>
    
    
        <section id="center">   
           <!-- @yield('two')-->
         </section>
        
    
</body>
</html>