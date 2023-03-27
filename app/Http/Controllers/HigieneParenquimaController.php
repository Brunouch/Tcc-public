<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreHigieneParenquimaRequest;
use App\Http\Requests\UpdateHigieneParenquimaRequest;
use Illuminate\Http\Request;
use App\Models\HigieneParenquima;
use App\Models\StatusClinico;
use App\Facades\UserPermission;

class HigieneParenquimaController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(HigieneParenquima::class, 'higiene');
    }

    public function index()
    {
        $higiene = HigieneParenquima::all();

        return view('higienes.index', compact(['higiene']));
    }

    public function validation(Request $request)
    {

        $rules = [
            'status_id' => 'required',
            'tosse' => 'required',
            'producao' => 'required',
            'eficacia' => 'required',
            'quantidade' => 'required',
            'aspecto' => 'required',
            'rolha' => 'required',
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
        $statusClin = StatusClinico::all();
        return view('higienes.create',compact('statusClin'));
    }

  
    public function store(Request $request)
    {   
        self::validation($request);
        
        $status = StatusClinico::find($request->status_id);

        $obj = new HigieneParenquima();

        $obj->status()->associate($status);

        $obj->tosse = $request->tosse;
        $obj->producao = $request->producao;
        $obj->eficacia = $request->eficacia;
        $obj->quantidade = $request->quantidade;
        $obj->aspecto = $request->aspecto;
        $obj->rolha = $request->rolha;

        $obj->save();

        return redirect()->route('higienes.index');
    }

    
    public function show(HigieneParenquima $higieneParenquima)
    {
        //
    }

    
    public function edit(HigieneParenquima $higiene)
    {
        $statusClinico = StatusClinico::all();
        if (isset($higiene)) {
            return view('higienes.edit', compact(['higiene','statusClinico']));
        }

        return "<h1>Higiene não Encontrado!</h1>";
    }

    
    public function update(Request $request, HigieneParenquima $higiene)
    {   
        self::validation($request);
        $status = StatusClinico::find($request->status_id);

        if (isset($higiene)) {
            $higiene->status()->associate($status);
            $higiene->tosse = $request->tosse;
            $higiene->producao = $request->producao;
            $higiene->eficacia = $request->eficacia;
            $higiene->quantidade = $request->quantidade;
            $higiene->aspecto = $request->aspecto;
            $higiene->rolha = $request->rolha;
            $higiene->save();

            return redirect()->route('higienes.index');
        }

        return "<h1>Higiene não Encontrado!</h1>";
    }

    
    public function destroy(HigieneParenquima $higiene)
    {
        if (isset($higiene)) {
            $higiene->delete();
            return redirect()->route('higienes.index');
        }

        return "<h1>Higiene não Encontrado!</h1>";
    }
}
