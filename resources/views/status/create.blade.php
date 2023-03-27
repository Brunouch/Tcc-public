@extends('templates/middleware', ['titulo' => "Status Clinico", 'rota' => "status.create"])

@section('conteudo')

<form action="{{ route('status.store') }}" method="POST">
    @csrf
    <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-dark text-white">Paciente</span>
                        <select name="cliente_id" class="form-select @if($errors->has('cliente_id')) is-invalid @endif">
                            @foreach ($cliente as $item)
                            <option value="{{$item->id}}" @if($item->id == old('cliente_id')) selected="true" @endif>
                                {{ $item->nome }}
                            </option>
                            @endforeach
                        </select>
                        @if($errors->has('cliente_id'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('cliente_id') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control @if($errors->has('dataHora')) is-invalid @endif"  name="dataHora" placeholder="dataHora" value="{{old('dataHora')}}" />
                        <label for="nome">Data Hora</label>
                        @if($errors->has('dataHora'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('dataHora') }}
                        </div>
                        @endif
                    </div>
                </div>            
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('sedacao')) is-invalid @endif" name="sedacao"  placeholder="sedacao" value="{{old('sedacao')}}" />
                        <label for="sedacao">Sedação</label>
                        @if($errors->has('sedacao'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('sedacao') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('glasgow')) is-invalid @endif" name="glasgow" placeholder="glasgow" value="{{old('glasgow')}}" />
                        <label for="glasgow">Glasgow</label>
                        @if($errors->has('glasgow'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('glasgow') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('rass')) is-invalid @endif" name="rass" placeholder="rass" value="{{old('rass')}}" />
                        <label for="rass">Rass</label>
                        @if($errors->has('rass'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('rass') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('pa')) is-invalid @endif" name="pa" placeholder="pa" value="{{old('pa')}}" />
                        <label for="pa">PA</label>
                        @if($errors->has('pa'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('pa') }}
                        </div>
                        @endif
                    </div>
                </div>            
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('fc')) is-invalid @endif" name="fc"  placeholder="fc" value="{{old('fc')}}" />
                        <label for="fc">Fc</label>
                        @if($errors->has('fc'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('fc') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type=text class="form-control @if($errors->has('dva')) is-invalid @endif" name="dva" placeholder="dva" value="{{old('dva')}}" />
                        <label for="dva">DVA</label>
                        @if($errors->has('dva'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('dva') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('spo2')) is-invalid @endif" name="spo2" placeholder="spo2" value="{{old('spo2')}}" />
                        <label for="spo2">spO2</label>
                        @if($errors->has('spo2'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('spo2') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{route('status.index')}}" class="btn btn-dark btn-block align-content-center">
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