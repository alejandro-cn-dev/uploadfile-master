@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <h1 class="text-3xl text-center font-bold">Iniciar Sesión</h1>
    <form action="" class="mt-4" method="POST">
        @csrf
        <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" name="email" id="email">
        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password" name="password" id="password">
        @error('message')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>    
        @enderror        
        <button type="submit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Enviar</button>
    </form>
</div>

@endsection