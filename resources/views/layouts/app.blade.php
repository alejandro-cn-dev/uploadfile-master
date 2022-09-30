<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->    
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('style')
    <title>@yield('title') - Laravel App</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="flex py-5 bg-orange-500 text-white">
        <div class="w-1/2 px-12 mr-auto">
            <p class="text 2xl font-bold">Gestión documental v2</p>
        </div>
        <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
            @if(auth()->check())
                <li class="mx-6">
                    <p class="text-xl ">Bienvenido <b>{{ auth()->user()->name}}</b></p>
                </li>
                <li>
                    <a href="{{ route('login.destroy')}}" class="font-bold py-3 px-4 rounded-md bg-red-700 hover:bg-red-800 hover:text-white-700">Cerrar Sesión</a>
                </li>   
            @else
                <li class="mx-6">
                    <a href="{{ route('login.index')}}" class="font-semibold hover:bg-orange-700 py-3 px-4 rounded-md">Iniciar Sesión</a>
                </li>
                <li>
                    <a href="{{ route('register.index')}}" class="font-semibold border-2 border-white py-2 px-4 hover:bg-white hover:text-indigo-700 rounded-md">Registrar</a>
                </li>    
            @endif
        </ul>
    </nav>
    @yield('content')
    @yield('script')
</body>
</html>