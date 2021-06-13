@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            {{ __('Adicionar Tarefa') }}
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <a href="{{ route('tarefa.create') }}" class="mr-3">Novo</a>
                                <a href="{{ route('tarefa.exportacao',['extensao' => 'xlsx']) }}" class="mr-3">XLSX</a>
                                <a href="{{ route('tarefa.exportacao',['extensao' => 'csv']) }}" class="mr-3">CSV</a>
                                <a href="{{ route('tarefa.exportacao',['extensao' => 'pdf']) }}" class="mr-3">MPDF</a>
                                <a href="{{ route('tarefa.exportar') }}" target="_blank">DOMPDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">  
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tarefa</th>
                                <th>Data para Conclusão</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $key => $tarefa)
                                <tr>
                                    <th>{{$tarefa->id}}</th>
                                    <td>{{ $tarefa->tarefa }}</td>
                                    <td>{{ date('d/m/Y',strtotime($tarefa->data_limite_conclusao)) }}</td>
                                    <td>
                                        <a href="{{ route('tarefa.edit',$tarefa->id) }}">Editar</a>
                                    </td>
                                    <td>
                                        <form id="form_{{ $tarefa->id }}" method="post" action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a href="#" onclick="document.getElementById('form_{{ $tarefa->id }}').submit()">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            @if ($tarefas->currentPage() > 1)
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                            @endif
                            @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active':''}}">
                                        <a class="page-link" href="{{ $tarefas->url($i) }}">
                                            {{ $i }}
                                        </a>
                                    </li>
                                    @endfor
                            @if ($tarefas->lastPage() > 3)
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Próxima</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
