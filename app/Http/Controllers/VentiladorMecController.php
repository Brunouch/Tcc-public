<?php

namespace App\Http\Controllers;

use App\Models\VentiladorMec;
use App\Http\Requests\StoreVentiladorMecRequest;
use App\Http\Requests\UpdateVentiladorMecRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Facades\UserPermission;

class VentiladorMecController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(VentiladorMec::class, 'vent');
    }

    public function index()
    {

        $vent = VentiladorMec::with('cliente')->get();

        return view('vents.index', compact(['vent']));
    }

    public function validation(Request $request)
    {

        $rules = [
            'cliente_id' => 'required',
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
        $paciente = Cliente::all();
        return view('vents.create', compact('paciente'));
    }


    public function store(Request $request)
    {
         self::validation($request);

         $paciente = Cliente::find($request->cliente_id);


         $obj = new VentiladorMec();
         $obj->cliente()->associate($paciente);

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
 
         return redirect()->route('vents.index');
    }

    public function show(VentiladorMec $ventiladorMec)
    {
        
    }

   
    public function edit($id)
    {
        $ventiladorMec = VentiladorMec::with('cliente')->find($id);

        $clientes = Cliente::all();

        if (isset($ventiladorMec )) {
            return view('vents.edit', compact(['ventiladorMec','clientes']));
        }

        return "<h1>Ventliador Mecânico não Encontrado!</h1>";
    }

   
    public function update(Request $request, VentiladorMec $vent)
    {   
        self::validation($request);

        $paciente = Cliente::find($request->cliente_id);

        if (isset($vent)) {
            $vent->cliente()->associate($paciente);
            $vent->modo = $request->modo;
            $vent->ciclagem = $request->ciclagem;
            $vent->fio2 = $request->fio2;
            $vent->peep = $request->peep;
            $vent->fr_vm = $request->fr_vm;
            $vent->ie = $request->ie;
            $vent->templnsp = $request->templnsp;
            $vent->pc = $request->pc;
            $vent->ps = $request->ps;
            $vent->pav = $request->pav;
            $vent->volControl = $request->volControl;
            $vent->fluxOnda = $request->fluxOnda;
            $vent->sensibilidadeInspi = $request->sensibilidadeInspi;
            $vent->sensibilidadeExp = $request->sensibilidadeExp;
            $vent->assincronia = $request->assincronia;
            $vent->inclinacao = $request->inclinacao;
            $vent->viaAerea = $request->viaAerea;
            $vent->fixacaoRima = $request->fixacaoRima;
            $vent->pressaoCuff = $request->pressaoCuff;
            $vent->save();

            return redirect()->route('vents.index');
        }

        return "<h1>Ventilador Mecânico não Encontrado!</h1>";
    }

    public function destroy(VentiladorMec $vent)
    {
        if (isset($vent)) {
            $vent->delete();
            return redirect()->route('vents.index');
        }

        return "<h1>Ventilador Mecânico  não Encontrado!</h1>";
    }
    
}
