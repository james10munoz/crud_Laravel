@extends('layouts.app')

@section('titulo')
    Clientes registrados
@endsection

@section('contenido')
    <div class="w-full flex justify-center items-center mt-5">
        <table class="w-9/12 bg-white shadow-md rounded-md overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="border border-gray-600 px-4 py-2">Cedula</th>
                    <th class="border border-gray-600 px-4 py-2">Nombre</th>
                    <th class="border border-gray-600 px-4 py-2">Dirección</th>
                    <th class="border border-gray-600 px-4 py-2">Teléfono</th>
                    <th class="border border-gray-600 px-4 py-2" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td class="border-b px-4 py-2">{{ $cliente->cedula }}</td>
                        <td class="border-b px-4 py-2">{{ $cliente->nombre }}</td>
                        <td class="border-b px-4 py-2">{{ $cliente->direccion }}</td>
                        <td class="border-b px-4 py-2">{{ $cliente->telefono }}</td>
                        <td class="border-b px-4 py-2 flex space-x-2">
                            <button type="button" class="bg-green-500 hover:bg-green-600 transition-colors text-white px-3 py-1 rounded-lg">
                                <a href="{{ url('clientes/'.$cliente->cedula.'/edit') }}">Editar</a>
                            </button>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 transition-colors text-white px-3 py-1 rounded-lg">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-center mt-5">
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-52 p-3 text-white rounded-lg">
            <a href="{{ route('create') }}">Registrar cliente</a>
        </button>
    </div>
@endsection
