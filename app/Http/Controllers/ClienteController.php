<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        //
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'cedula' => 'required | unique:clientes',
            'name' => 'required',
            'direccion' => 'required',
            'telefono' => 'required | unique:clientes',
        ]);

        $clientes = new Cliente();
        $clientes->cedula=$request->input('cedula');
        $clientes->nombre=$request->input('name');
        $clientes->direccion=$request->input('direccion');
        $clientes->telefono=$request->input('telefono');
        $clientes->save();
        return redirect(route('inicio'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    public function edit($id)
    {
        //
        $cliente = Cliente::find($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'cedula' => 'required',
            'name' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $clientes = Cliente::find($id);
        $clientes->cedula=$request->input('cedula');
        $clientes->nombre=$request->input('name');
        $clientes->direccion=$request->input('direccion');
        $clientes->telefono=$request->input('telefono');
        $clientes->save();
        return redirect(route('inicio'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cedula)
    {
        //
        $clientes=Cliente::where('id', '=', $cedula)->first();
        //$clientes=Cliente::find($cedula);
        $clientes->delete();
        return redirect()->back();
    }
}
