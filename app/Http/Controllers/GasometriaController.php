<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Gasometria;
use App\Models\ParametrosAtingidos;
use App\Http\Requests\StoreGasometriaRequest;
use App\Http\Requests\UpdateGasometriaRequest;

class GasometriaController extends Controller
{
    
    public function index()
    {
        $gasometria = Gasometria::with('parametros')->get();

        return view('gasos.index', compact(['gasometria']));
    }

    public function validation(Request $request)
    {

        $rules = [
            'parametros_id' => 'required',
            'dataHoraGaso' => 'required',
            'Ph' => 'required',
            'PaCO2' => 'required',
            'PaO2' => 'required',
            'BE' => 'required',
            'HCO3' => 'required',
            'SaO2' => 'required',
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
        $parametros = ParametrosAtingidos::all();
        return view('gasos.create', compact('parametros'));
    }

  
    public function store(Request $request)
    {
        self::validation($request);

        $parametros = ParametrosAtingidos::find($request->parametros_id);

        $obj = new Gasometria();
        $obj->parametros()->associate($parametros);
        $obj->dataHoraGaso = $request->dataHoraGaso;
        $obj->ph = $request->Ph;
        $obj->paco2 = $request->PaCO2;
        $obj->pao2 = $request->PaO2;
        $obj->be = $request->BE;
        $obj->hco3 = $request->HCO3;
        $obj->sao2 = $request->SaO2;

        $obj->save();

        return redirect()->route('gasos.index');
    }

    public function edit($id)
    {
        $gasometria = Gasometria::find($id);
        $parametros = ParametrosAtingidos::all();
        

        if (isset($gasometria)) {
            return view('gasos.edit', compact('gasometria','parametros'));
        }

        return "<h1>Gasometria não Encontrado!</h1>";
    }

    
    public function update(Request $request, $id)
    {   
        self::validation($request);

        $gasometria = Gasometria::find($id);
        $parametros= ParametrosAtingidos::find($request->parametros_id);

        if (isset($gasometria)) {   
            $gasometria->parametros()->associate($parametros);
            $gasometria->dataHoraGaso = $request->dataHoraGaso;
            $gasometria->ph = $request->Ph;
            $gasometria->paco2 = $request->PaCO2;
            $gasometria->pao2 = $request->PaO2;
            $gasometria->be = $request->BE;
            $gasometria->hco3 = $request->HCO3;
            $gasometria->sao2 = $request->SaO2;
            $gasometria->save();

            return redirect()->route('gasos.index');
        }

        return "<h1>Gasometria não Encontrado!</h1>";
    }

  
    public function destroy($id)
    {
        $obj = Gasometria::find($id);

        if (isset($id)) {
            $obj->delete();
            return redirect()->route('gasos.index');
        }

        return "<h1>Gasometria não Encontrado!</h1>";
    }
}
