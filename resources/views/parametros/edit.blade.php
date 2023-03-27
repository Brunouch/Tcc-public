@extends('templates/middleware', ['titulo' => "Parametros Atingidos ", 'rota' => "parametros.create"])

@section('conteudo')

<form action="{{ route('parametros.update', $parametrosAtingidos->id) }}" method="POST" id="formUpdate">
     @csrf
     @method('PUT')
     <div class="row">
          <div class="col">
               <div class="input-group mb-3">
                    <span class="input-group-text bg-dark text-white">Ventilador Mecânico</span>
                    <select name="vent_id" class="form-select @if($errors->has('vent_id')) is-invalid @endif">
                         @foreach ($vent as $item)
                         <option value="{{$item->id}}" @if($item->id == $parametrosAtingidos->vent->id)) selected="true" @endif>
                              {{ $item->id }}
                         </option>
                         @endforeach
                    </select>
                    @if($errors->has('vent_id'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('vent_id') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">    
          <div class="col-md-12">
               <div class="form-floating mb-3">
                    <input type="number" class="form-control @if($errors->has('volReal')) is-invalid @endif" name="volReal" placeholder="volReal" value="{{$parametrosAtingidos->volReal}}" />
                    <label for="volReal">vol Real</label>
                    @if($errors->has('volReal'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('volReal') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('volMin')) is-invalid @endif" name="volMin" placeholder="volMin" value="{{$parametrosAtingidos->volMin}}" />
                    <label for="volMin">vol Min</label>
                    @if($errors->has('volMin'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('volMin') }}
                    </div>
                    @endif
               </div>
          </div>
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="number" class="form-control @if($errors->has('pPico')) is-invalid @endif" name="pPico" placeholder="pPico" value="{{$parametrosAtingidos->pPico}}" />
                    <label for="pPico">pPico</label>
                    @if($errors->has('pPico'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('pPico') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="number" class="form-control @if($errors->has('pMedia')) is-invalid @endif" name="pMedia" placeholder="pMedia" value="{{$parametrosAtingidos->pMedia}}" />
                    <label for="pMedia">p Media</label>
                    @if($errors->has('pMedia'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('pMedia') }}
                    </div>
                    @endif
               </div>
          </div>     
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type=text class="form-control @if($errors->has('pPlato')) is-invalid @endif" name="pPlato" placeholder="pPlato" value="{{$parametrosAtingidos->pPlato}}" />
                    <label for="pPlato">pPlato</label>
                    @if($errors->has('pPlato'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('pPlato') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('complacencia')) is-invalid @endif" name="complacencia" placeholder="complacencia" value="{{$parametrosAtingidos->complacencia}}" />
                    <label for="complacencia">Complacencia</label>
                    @if($errors->has('complacencia'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('complacencia') }}
                    </div>
                    @endif
               </div>
          </div>    
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('resistencia')) is-invalid @endif" name="resistencia" placeholder="resistencia" value="{{$parametrosAtingidos->resistencia}}" />
                    <label for="resistencia">Resistencia</label>
                    @if($errors->has('resistencia'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('resistencia') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('autoPeep')) is-invalid @endif" name="autoPeep" placeholder="autoPeep" value="{{$parametrosAtingidos->autoPeep}}" />
                    <label for="autoPeep">autoPeep</label>
                    @if($errors->has('autoPeep'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('autoPeep') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col">
               <a href="{{route('parametros.index')}}" class="btn btn-dark btn-block align-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                         <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
                    </svg>
                    &nbsp; Voltar
               </a>
               <button type="submit" class="btn btn-success btn-block align-content-center">
                    Confirmar &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                         <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
               </button>
          </div>
     </div>
     </div>
     </div>
</form>
@endsection