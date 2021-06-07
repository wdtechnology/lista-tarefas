@guest
    <h1>Bem Vindo, Visitante</h1>
@endguest
@auth
    <h1>Bem Vindo, {{ Auth::user()->name }}</h1>
    <p>{{ Auth::user()->id }}</p>
    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>
@endauth