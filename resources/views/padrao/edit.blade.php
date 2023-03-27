@extends('templates/middleware', ['titulo' => "Ventilador Mecânico Padrao", 'rota' => "padrao.create"])

@section('conteudo')

<form action="{{ route('padrao.update', $padrao->id) }}" method="POST" id="formUpdate">
    @csrf
    @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('modo')) is-invalid @endif" name="modo" placeholder="modo" value="{{$padrao->modo}}" />
                        <label for="nome">Modo</label>
                        @if($errors->has('modo'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('modo') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('ciclagem')) is-invalid @endif" name="ciclagem" placeholder="ciclagem" value="{{$padrao->ciclagem}}" />
                        <label for="ciclagem">Ciclagem</label>
                        @if($errors->has('ciclagem'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('ciclagem') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('fio2')) is-invalid @endif" name="fio2" placeholder="fio2" value="{{$padrao->fio2}}" />
                        <label for="fio2">fiO2</label>
                        @if($errors->has('fio2'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('fio2') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('peep')) is-invalid @endif" name="peep" placeholder="peep" value="{{$padrao->peep}}" />
                        <label for="peep">Peep</label>
                        @if($errors->has('peep'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('peep') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @if($errors->has('fr_vm')) is-invalid @endif" name="fr_vm" placeholder="fr_vm" value="{{$padrao->fr_vm}}" />
                        <label for="fr_vm">FR_VM</label>
                        @if($errors->has('fr_vm'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('fr_vm') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type=text class="form-control @if($errors->has('ie')) is-invalid @endif" name="ie" placeholder="ie" value="{{$padrao->ie}}" />
                        <label for="ie">IE</label>
                        @if($errors->has('ie'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('ie') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('viaAerea')) is-invalid @endif" name="viaAerea" placeholder="viaAerea" value="{{$padrao->viaAerea}}" />
                        <label for="viaAerea">Via Aerea</label>
                        @if($errors->has('viaAerea'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('viaAerea') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{route('padrao.index')}}" class="btn btn-dark btn-block align-content-center">
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