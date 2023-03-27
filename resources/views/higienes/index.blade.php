@extends('templates.middleware', ['titulo' => "Higiene Parenquima", 'rota' => "higienes.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Higiene Parenquima @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')
<div class="col d-flex justify-content-end">

     <a href="{{ route('higienes.create') }}" class="btn btn-primary">Cadastrar
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
               <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
          </svg>
     </a>
</div>
<div class="row">
     <div class="col">
          <table class="table align-middle caption-top table-striped">
               <caption>Tabela de <b>Higiene Parenquima</b></caption>
               <thead>
                    <tr>
                         <th scope="col">Status Clinico</th>
                         <th scope="col">Tosse</th>
                         <th scope="col">Produção</th>
                         <th scope="col">Quantidade</th>
                         <th scope="col">Aspecto</th>
                         <th scope="col">Ações</th>
                    </tr>
               </thead>
               <tbody>
                    @foreach ($higiene as $item)
                    <tr>
                         <td scope="col">{{$item->status_id}}</td>
                         <td scope="col">{{$item->tosse}}</td>
                         <td scope="col">{{$item->producao}}</td>
                         <td scope="col">{{$item->quantidade}}</td>
                         <td scope="col">{{$item->aspecto}}</td>
                         <td>
                              <a href="{{ route('higienes.edit', $item->id) }}" class="btn btn-success">Editar
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                   </svg>
                              </a>
                              <a nohref style="cursor:pointer" onclick="showRemoveModal('{{ $item->id }}', '{{ $item->status_id }}', '{{ $item->tosse }}', '{{ $item->producao }}', '{{ $item->eficacia }}', '{{ $item->quantidade }}', '{{ $item->viscosidade }}', '{{ $item->aspecto }}', '{{ $item->rolha }}'  )" class="btn btn-danger">Excluir
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                   </svg>
                              </a>
                         </td>
                         <form action="{{ route('higienes.destroy', $item->id) }}" method="POST" id="form_{{$item->id}}">
                              @csrf
                              @method('DELETE')
                         </form>
                    </tr>
                    @endforeach
               </tbody>
          </table>
     </div>
</div>
@endsection