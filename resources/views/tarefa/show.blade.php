@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adicionar Tarefa') }}</div>
                <div class="card-body">  
                    <div class="mb-3">
                        <label class="form-label">Data Limite Conclusão</label>
                        <input type="date" class="form-control" readonly value="{{ $tarefa->data_limite_conclusao }}">    
                    </div>   
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
