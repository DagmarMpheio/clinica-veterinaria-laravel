@extends('layouts.backend.main')

@section('title')
Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-green text-white">
                    <h2 class="mb-0">
                        {{ __('Bem-vindo(a) ao Dashboard') }}
                        @auth
                            {{ Auth::user()->name }}!
                        @endauth
                    </h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead">
                        {{ __('Você está autenticado!') }}
                    </p>

                    @auth
                        <p class="lead">
                            @php
                                $hour = date('H');
                                $greeting = '';

                                if ($hour >= 5 && $hour < 12) {
                                    $greeting = __('Bom dia');
                                } elseif ($hour >= 12 && $hour < 18) {
                                    $greeting = __('Boa tarde');
                                } else {
                                    $greeting = __('Boa noite');
                                }
                            @endphp
                            {{ $greeting }}, aproveite sua visita!
                        </p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
