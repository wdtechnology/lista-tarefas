@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adicionar Tarefa') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('tarefa.update',['tarefa'=>$tarefa->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Tarefa</label>
                            <input type="text" class="form-control" name="tarefa" value="{{ $tarefa->tarefa }}">    
                        </div>    
                        <div class="mb-3">
                            <label class="form-label">Data Limite Conclusão</label>
                            <input type="date" class="form-control" name="data_limite_conclusao" value="{{ $tarefa->data_limite_conclusao }}">    
                        </div>   
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
