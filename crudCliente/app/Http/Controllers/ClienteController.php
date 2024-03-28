<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use App\Http\Requests\StoreClienteModelRequest;
use App\Http\Requests\UpdateClienteModelRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private ClienteModel $cliente) {}

    public function getClientes(){
        $clientes = ClienteModel::paginate(10);

        return $clientes;
    }
    public function index()
    {
        $clientes= $this->getClientes();
        return inertia::render('Welcome', [
                'clientes' => $clientes
            ]);
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
    public function store(StoreClienteModelRequest $request)
    {
        try{
            $cliente = ClienteModel::create($request->validated());
            //return $request;
            return redirect()->route('cliente.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ClienteModel $clienteModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClienteModel $clienteModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteModelRequest $request)
    {
        try{
            $cliente = ClienteModel::where('id',$request->id)->first();
            $cliente->update($request->validated());
            //return $cliente;
            return redirect()->route('cliente.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            ClienteModel::where('id',$request->id)->delete();
            return $request;
            ClienteModel::where('id',$request->id)->delete();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
