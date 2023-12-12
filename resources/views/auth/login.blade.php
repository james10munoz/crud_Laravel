@extends('layouts.app')

@section('titulo')
    Iniciar sesión
@endsection

@section('contenido')
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-semibold mb-6">Iniciar sesión</h2>

            <form method="post">
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="border p-3 w-full rounded-lg focus:outline-none focus:border-blue-500" placeholder="Ingrese su correo" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" class="border p-3 w-full rounded-lg focus:outline-none focus:border-blue-500" placeholder="Ingrese su contraseña">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 transition-colors cursor-pointer text-white font-bold w-full p-3 rounded-lg">Iniciar sesión</button>
            </form>
        </div>
    </div>
@endsection
