@extends('layouts.auth.app')

@section('title')
Verificar Email
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique o Seu Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Enviamos recentemente um link para sua caixa de correio para verificar o seu email.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor verifique um link de confirmação na sua caixa de correio de email.') }}
                    {{ __('Se não recebeu o link o email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique aqui para receber novamente.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
