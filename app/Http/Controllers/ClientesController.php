<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Giro;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{

    /* retorna a la vista inicial de clientes */
    public function index()
    {
        return view('clientes.index');
    }

    /* retorna a la vista para crear un cliente */
    public function create()
    {
        return view('clientes.create', [
            'contactos' => Contacto::select('id', 'contacto1')->get(),
            'estados' => Estado::select('id', 'nombre')->get(),
            'municipios' => Municipio::select('id', 'nombre')->get(),
            'giros' => Giro::select('id', 'nombre')->get()
        ]);
    }

    /* retorna ala vista para editar cliente */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente,
            'contactos' => Contacto::select('id', 'contacto1')->get(),
            'estados' => Estado::select('id', 'nombre')->get(),
            'municipios' => Municipio::select('id', 'nombre')->get(),
            'giros' => Giro::select('id', 'nombre')->get()


        ]);
    }

    /* actualiza un cliente */
    public function update(ClienteRequest $request, cliente $cliente)
    {
        $cliente->update($request->validated());
        $cliente->save();
        return redirect()
            ->route('clientes.index')
            ->withSuccess("El cliente $cliente->nombreempresa se actualizo exitosamente");
    }

    /* crea un cliente, validando a atravez del product request */
    public function store(ClienteRequest $request)
    {
        /*  dd($request->all()); */
        $cliente = Cliente::create($request->validated());
        return redirect()
            ->route('clientes.index')
            ->withSuccess("El cliente $cliente->nombreempresa se guardo correctamente");
    }

    /* muestra el detalle de un ciente */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    /* obtiene los estados */
    public function estados()
    {
        $estados = DB::table('estados')->get();
        return view('system.clientes.index', compact('estados'));
    }

    /* obtiene los municipios */
    public function getMunicipios(Request $request)
    {
        $municipios = DB::table('municipios')
            ->where('estado_id', $request->estado_id)
            ->get();
        if (count($municipios) > 0) {
            return response()->json($municipios);
        }
    }

    /* retorna los registros en la tabla */
    public function RegistrosDatatables()
    {
        return datatables()
            ->eloquent(
                Cliente::query()
                    ->with([
                        'giro',
                        'contacto'
                    ])

            )->toJson();
    }

    /* elimina un registro */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()
            ->route("clientes.index")
            ->withSuccess("El producto $cliente->nombre se ha dado de baja exitosamente");
    }
}
