<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\VentiladorMec;
use App\Models\StatusClinico;
use App\Http\Requests\StoreStatusClinicoRequest;
use App\Http\Requests\UpdateStatusClinicoRequest;
use Illuminate\Http\Request;
use App\Facades\UserPermission;


class StatusClinicoController extends Controller
{
    public function __construct()
    {
    //    $this->authorizeResource(StatusClinico::class, 'status');
    }

    public function index()
    {
        $status = StatusClinico::with('cliente')->get();

        return view('status.index', compact(['status']));
    }

    public function validation(Request $request)
    {

        $rules = [
            'cliente_id' => 'required',
            'dataHora' => 'required',
            'sedacao' => 'required',
            'glasgow' => 'required',
            'rass' => 'required',
            'pa' => 'required',
            'fc' => 'required',
            'dva' => 'required',
            'spo2' => 'required',

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
        $cliente = Cliente::all();
        return view('status.create', compact('cliente'));
    }

    public function store(Request $request)
    {   
        self::validation($request);

        $paciente = Cliente::find($request->cliente_id);

        $obj = new StatusClinico();
        
        $obj->cliente()->associate($paciente);
        $obj->dataHora = $request->dataHora;
        $obj->sedacao = $request->sedacao;
        $obj->glasgow = $request->glasgow;
        $obj->rass = $request->rass;
        $obj->fc = $request->fc;
        $obj->pa = $request->pa;
        $obj->dva = $request->dva;
        $obj->spo2 = $request->spo2;
        $obj->save();

        return redirect()->route('status.index');
    }


    public function show(StatusClinico $statusClinico)
    {
        //
    }


    public function edit($id)
    {
        
        $status = StatusClinico::find($id);
        $clientes = Cliente::all();
        
        if (isset($status)) {
            return view('status.edit', compact('status','clientes'));
        }

        return "<h1>Status Clinico não Encontrado!</h1>";
    }


    public function update(Request $request, StatusClinico $status)
    {   
        self::validation($request);

        $paciente = Cliente::find($request->cliente_id);

        if (isset($status)) {
            $status->cliente()->associate($paciente);
            $status->cliente()->associate($paciente);
            $status->dataHora = $request->dataHora;
            $status->sedacao = $request->sedacao;
            $status->glasgow = $request->glasgow;
            $status->rass = $request->rass;
            $status->fc = $request->fc;
            $status->pa = $request->pa;
            $status->dva = $request->dva;
            $status->spo2 = $request->spo2;
            $status->save();

            return redirect()->route('status.index');
        }

        return "<h1>Status Clinico não Encontrado!</h1>";
    }


    public function destroy(StatusClinico $status)
    {
        if (isset($status)) {
            $status->delete();
            return redirect()->route('status.index');
        }

        return "<h1>Status Clinico não Encontrado!</h1>";
    }
}
