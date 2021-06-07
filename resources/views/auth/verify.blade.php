@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Falta pouco precisamos apenas que você valide seu e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Reenviamos um e-mail para você com o link de validação') }}
                        </div>
                        @endif
                        
                        {{ __('Antes de utilizar os recursos da aplicação, por favor valide seu e-mail por meio do link de verificação que encaminhamos para seu e-mail.') }}
                        <br>
                        {{ __('Caso você não tenha recebido o e-mail de verificação, clique o link a seguir para receber um novo e-mail.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique Aqui!') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
