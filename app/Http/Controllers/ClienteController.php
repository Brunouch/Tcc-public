<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;
use App\Facades\UserPermission;

class ClienteController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Cliente::class, 'cliente');
    }
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', compact(['clientes']));
    }

    public function validation(Request $request)
    {

        $rules = [
            'nome' => 'required|max:100|min:10',
            'idade' => 'required',
            'sexo' => 'required',
            'dataInternamento' => 'required',
            'diagnosticoInt' => 'required',
            'diagnosticoClin' => 'required',
            'dataIOT' => 'required',
            'altura' => 'required|min:1',
            'pesoIdeal' => 'required|min:1',
            'diasInter' => 'required|min:1',

        ];
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($rules, $msgs);
    }

    public function create()
    {

        return view('clientes.create');
    }

    public function show($id)
    {

        
    }

    public function store(Request $request)
    {
         self::validation($request);

        $obj = new Cliente();
        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
        $obj->idade = $request->idade;
        $obj->sexo = $request->sexo;
        $obj->dataInter = $request->dataInternamento;
        $obj->diagnosticoInter = $request->diagnosticoInt;
        $obj->diagnosticoClin = $request->diagnosticoClin;
        $obj->dataIOT = $request->dataIOT;
        $obj->altura = $request->altura;
        $obj->pesoIdeal = $request->pesoIdeal;
        $obj->diasInter = $request->diasInter;
        $obj->save();

        return redirect()->route('clientes.index');
    }





    public function edit(Cliente $cliente)
    {

        if (isset($cliente)) {
            return view('clientes.edit', compact('cliente'));
        }

        return "<h1>Clientes não Encontrado!</h1>";
    }


    public function update(Request $request, Cliente $cliente)
    {
        self::validation($request);


        if (isset($cliente)) {
            $cliente->nome = mb_strtoupper($request->nome, 'UTF-8');
            $cliente->idade = $request->idade;
            $cliente->sexo = $request->sexo;
            $cliente->dataInter = $request->dataInternamento;
            $cliente->diagnosticoInter = $request->diagnosticoInt;
            $cliente->diagnosticoClin = $request->diagnosticoClin;
            $cliente->dataIOT = $request->dataIOT;
            $cliente->altura = $request->altura;
            $cliente->pesoIdeal = $request->pesoIdeal;
            $cliente->diasInter = $request->diasInter;

            $cliente->save();

            return redirect()->route('clientes.index');
        }

        return "<h1>Cliente não Encontrado!</h1>";
    }


    public function destroy(Cliente $cliente)
    {

        if (isset($cliente)) {
            $cliente->delete();
            return redirect()->route('clientes.index');
        }

        return "<h1>Cliente não Encontrado!</h1>";
    }
}
