@extends('templates/middleware', ['titulo' => "Gasometria", 'rota' => "gasos.create"])

@section('conteudo')

<form action="{{ route('gasos.store') }}" method="POST">
    @csrf
    <div class="row">
                <div class="col">
                    <div class="input-group mb-3 ">
                        <span class="input-group-text bg-dark text-white">Parametros Atingidos</span>
                        <select name="parametros_id" class="form-select @if($errors->has('parametros_id')) is-invalid @endif">
                            @foreach ($parametros as $item)
                            <option value="{{$item->id}}" @if($item->id == old('parametros_id')) selected="true" @endif>
                                {{ $item->id }}
                            </option>
                            @endforeach
                        </select>
                        @if($errors->has('parametros_id'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('parametros_id') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control @if($errors->has('dataHoraGaso')) is-invalid @endif"  name="dataHoraGaso" placeholder="dataHora" value="{{old('dataHoraGaso')}}" />
                        <label for="dataHoraGaso">Data Hora</label>
                        @if($errors->has('dataHoraGaso'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('dataHoraGaso') }}
                        </div>
                        @endif
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('ph')) is-invalid @endif" name="Ph" placeholder="ph" value="{{old('ph')}}" />
                        <label for="ph">Ph</label>
                        @if($errors->has('ph'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('ph') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('paco2')) is-invalid @endif" name="PaCO2" placeholder="paco2" value="{{old('paco2')}}" />
                        <label for="paco2">PaCO2</label>
                        @if($errors->has('paco2'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('paco2') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('pao2')) is-invalid @endif" name="PaO2" placeholder="pao2" value="{{old('pao2')}}" />
                        <label for="pao2">PaO2</label>
                        @if($errors->has('pao2'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('pao2') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type=number class="form-control @if($errors->has('be')) is-invalid @endif" name="BE" placeholder="be" value="{{old('be')}}" />
                        <label for="be">BE</label>
                        @if($errors->has('be'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('be') }}
                        </div>
                        @endif
                    </div>
                </div>
           
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type=number class="form-control @if($errors->has('hco3')) is-invalid @endif" name="HCO3" placeholder="hco3" value="{{old('hco3')}}" />
                        <label for="hco3">HCO3</label>
                        @if($errors->has('hco3'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('hco3') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type=text class="form-control @if($errors->has('sao2')) is-invalid @endif" name="SaO2" placeholder="sao2" value="{{old('sao2')}}" />
                        <label for="sao2">SaO2</label>
                        @if($errors->has('sao2'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('sao2') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{route('gasos.index')}}" class="btn btn-dark btn-block align-content-center">
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