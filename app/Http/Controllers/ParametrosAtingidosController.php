<?php

namespace App\Http\Controllers;

use App\Models\ParametrosAtingidos;
use App\Http\Requests\StoreParametrosAtingidosRequest;
use App\Http\Requests\UpdateParametrosAtingidosRequest;
use App\Models\VentiladorMec;
use App\Models\StatusClinico;
use Illuminate\Http\Request;
use App\Facades\UserPermission;

class ParametrosAtingidosController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(ParametrosAtingidos::class, 'parametros');
    }

    public function index()
    {
        $parametrosAtingidos = ParametrosAtingidos::all();

        return view('parametros.index', compact(['parametrosAtingidos']));
    }

    public function validation(Request $request)
    {

        $rules = [
            'vent_id' => 'required',
            'volReal' => 'required',
            'volMin' => 'required',
            'pPico' => 'required',
            'pMedia' => 'required',
            'pPlato' => 'required',
            'complacencia' => 'required',
            'resistencia' => 'required',
            'autoPeep' => 'required',
            
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

        $ventiladorMec  = VentiladorMec::all();

        return view('parametros.create',compact('ventiladorMec'));
    }


    public function store(Request $request)
    {   
        self::validation($request);

        $ventiladorMec = VentiladorMec::find($request->vent_id);

        $obj = new ParametrosAtingidos();
        $obj->vent()->associate($ventiladorMec);
        $obj->volReal = $request->volReal;
        $obj->volMin = $request->volMin;
        $obj->pPico = $request->pPico;
        $obj->pMedia = $request->pMedia;
        $obj->pPlato = $request->pPlato;
        $obj->complacencia = $request->complacencia;
        $obj->resistencia = $request->resistencia;
        $obj->autoPeep = $request->autoPeep;
        $obj->save();

        return redirect()->route('parametros.index');
    }


    public function show(ParametrosAtingidos $parametrosAtingidos)
    {
        //
    }

    public function edit($id)
    {
        $parametrosAtingidos = ParametrosAtingidos::find($id);
        $vent = VentiladorMec::all();

       
        if (isset($parametrosAtingidos)) {
            return view('parametros.edit', compact('parametrosAtingidos', 'vent'));
        }

        return "<h1>Parametros Atingidos não Encontrado!</h1>";
    }


    public function update(Request $request,  $id)
    {      
        self::validation($request);

        $parametros = ParametrosAtingidos::find($id);
        $vent = VentiladorMec::find($request->vent_id);

        if (isset($parametros)) {
            $parametros->vent()->associate($vent);
            $parametros->volReal = $request->volReal;
            $parametros->volMin = $request->volMin;
            $parametros->pPico = $request->pPico;
            $parametros->pMedia = $request->pMedia;
            $parametros->pPlato = $request->pPlato;
            $parametros->complacencia = $request->complacencia;
            $parametros->resistencia = $request->resistencia;
            $parametros->autoPeep = $request->autoPeep;
            $parametros->save();


            return redirect()->route('parametros.index');
        }

        return "<h1>Parametros Atingidos não Encontrado!</h1>";
    }


    public function destroy($id)
    {
        $obj = ParametrosAtingidos::find($id);

        if (isset($id)) {
            $obj->delete();
            return redirect()->route('parametros.index');
        }

        return "<h1>Parametros Atingidos não Encontrado!</h1>";
    }
}
