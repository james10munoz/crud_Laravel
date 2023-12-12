
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>
<body class="font-sans bg-gray-100">

    <header class="p-5 border-b bg-white shadow flex justify-between items-center">
        <h1 class="text-3xl font-black">
            Tienda en linea de electrodomesticos 
        </h1>
        @auth
            <nav class="flex gap-2 items-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="font-bold text-gray-600 hover:text-gray-800">Cerrar sesión</button>
                </form>
            </nav>
        @endauth

        @guest
            <nav class="flex gap-2 items-center">
                <a class="font-bold text-gray-600 hover:text-gray-800" href="{{ route('login') }}"> Login </a>
                <a class="font-bold text-gray-600 hover:text-gray-800" href="{{ route('register') }}"> Registrar </a>
            </nav>
        @endguest
    </header>

    <main class="flex flex-col justify-center container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

</body>
</html>
