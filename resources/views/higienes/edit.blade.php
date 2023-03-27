@extends('templates/middleware', ['titulo' => "Higiene Parenquima", 'rota' => "higienes.create"])

@section('conteudo')

<form action="{{ route('higienes.update', $higiene->id) }}" method="POST" id="formUpdate">
     @csrf
     @method('PUT')
     <div class="row">
          <div class="col">
               <div class="input-group mb-3">
                    <span class="input-group-text bg-dark text-white">Status Clinico</span>
                    <select name="status_id" class="form-select @if($errors->has('status_id')) is-invalid @endif">
                         @foreach ($statusClinico as $item)
                         <option value="{{$item->id}}" @if($item->id == $higiene->id) selected="true" @endif>
                              {{ $item->id }}
                         </option>
                         @endforeach
                    </select>
                    @if($errors->has('status_id'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('status_id') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('tosse')) is-invalid @endif" name="tosse" placeholder="tosse" value="{{$higiene->tosse}}" />
                    <label for="tosse">Tosse</label>
                    @if($errors->has('tosse'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('tosse') }}
                    </div>
                    @endif
               </div>
          </div>   
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('producao')) is-invalid @endif" name="producao" placeholder="producao" value="{{$higiene->producao}}" />
                    <label for="producao">Producao</label>
                    @if($errors->has('producao'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('producao') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('eficacia')) is-invalid @endif" name="eficacia" placeholder="eficacia" value="{{$higiene->eficacia}}" />
                    <label for="eficacia">Eficacia</label>
                    @if($errors->has('eficacia'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('eficacia') }}
                    </div>
                    @endif
               </div>
          </div>
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('quantidade')) is-invalid @endif" name="quantidade" placeholder="quantidade" value="{{$higiene->quantidade}}" />
                    <label for="quantidade">Quantidade</label>
                    @if($errors->has('quantidade'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('quantidade') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>
     <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type=text class="form-control @if($errors->has('rolha')) is-invalid @endif" name="rolha" placeholder="Rolha" value="{{$higiene->rolha}}" />
                        <label for="rolha">Rolha</label>
                        @if($errors->has('rolha'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('rolha') }}
                        </div>
                        @endif
                    </div>
                </div>
          <div class="col-md-6">
               <div class="form-floating mb-3">
                    <input type=text class="form-control @if($errors->has('aspecto')) is-invalid @endif" name="aspecto" placeholder="aspecto" value="{{$higiene->aspecto}}" />
                    <label for="aspecto">Aspecto</label>
                    @if($errors->has('aspecto'))
                    <div class='invalid-feedback'>
                         {{ $errors->first('aspecto') }}
                    </div>
                    @endif
               </div>
          </div>
     </div>

     <div class="row">
          <div class="col">
               <a href="{{route('higienes.index')}}" class="btn btn-dark btn-block align-content-center">
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