<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVentiladorMecRequest;
use App\Http\Requests\UpdateVentiladorMecRequest;
use App\Models\VentPadrao;

class VentPadraoController extends Controller
{
    
    public function index()
    {   
        $padrao = VentPadrao::all();

        return view('padrao.index', compact(['padrao']));
        
    }

    public function validation(Request $request)
    {

        $rules = [
            'modo' => 'required',
            'ciclagem' => 'required',
            'fio2' => 'required',
            'peep' => 'required',
            'fr_vm' => 'required',
            'ie' => 'required',
            'viaAerea' => 'required',

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
        return view('padrao.create');
    }

   
    public function store(Request $request)
    {
        self::validation($request);


         $obj = new VentPadrao();
         $obj->modo = $request->modo;
         $obj->ciclagem = $request->ciclagem;
         $obj->fio2 = $request->fio2;
         $obj->peep = $request->peep;
         $obj->fr_vm = $request->fr_vm;
         $obj->ie = $request->ie;
         $obj->templnsp = $request->templnsp;
         $obj->pc = $request->pc;
         $obj->ps = $request->ps;
         $obj->pav = $request->pav;
         $obj->volControl = $request->volControl;
         $obj->fluxOnda = $request->fluxOnda;
         $obj->sensibilidadeInspi = $request->sensibilidadeInspi;
         $obj->sensibilidadeExp = $request->sensibilidadeExp;
         $obj->assincronia = $request->assincronia;
         $obj->inclinacao = $request->inclinacao;
         $obj->viaAerea = $request->viaAerea;
         $obj->fixacaoRima = $request->fixacaoRima;
         $obj->pressaoCuff = $request->pressaoCuff;
         
         $obj->save();
 
         return redirect()->route('padrao.index');
    }

    
    public function show($id)
    {
        
    }

   
    public function edit(VentPadrao $padrao)
    {
    
        if (isset($padrao)) {
            return view('padrao.edit', compact('padrao'));
        }

        return "<h1>Ventiliador Padrão não Encontrado!</h1>";
    }

    
    public function update(Request $request, VentPadrao $padrao)
    {
        self::validation($request);

        if (isset($padrao)) {
            
            $padrao->modo = $request->modo;
            $padrao->ciclagem = $request->ciclagem;
            $padrao->fio2 = $request->fio2;
            $padrao->peep = $request->peep;
            $padrao->fr_vm = $request->fr_vm;
            $padrao->ie = $request->ie;
            $padrao->templnsp = $request->templnsp;
            $padrao->pc = $request->pc;
            $padrao->ps = $request->ps;
            $padrao->pav = $request->pav;
            $padrao->volControl = $request->volControl;
            $padrao->fluxOnda = $request->fluxOnda;
            $padrao->sensibilidadeInspi = $request->sensibilidadeInspi;
            $padrao->sensibilidadeExp = $request->sensibilidadeExp;
            $padrao->assincronia = $request->assincronia;
            $padrao->inclinacao = $request->inclinacao;
            $padrao->viaAerea = $request->viaAerea;
            $padrao->fixacaoRima = $request->fixacaoRima;
            $padrao->pressaoCuff = $request->pressaoCuff;
            $padrao->save();

            return redirect()->route('padrao.index');
        }

        return "<h1>Ventilador Padrão não Encontrado!</h1>";
    }

   
    public function destroy(VentPadrao $padrao)
    {
        if (isset($padrao)) {
            $padrao->delete();
            return redirect()->route('padrao.index');
        }

        return "<h1>Ventilador Padrão  não Encontrado!</h1>";
    }
}
