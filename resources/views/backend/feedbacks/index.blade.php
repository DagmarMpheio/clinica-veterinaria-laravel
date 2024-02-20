@extends('layouts.backend.main')

@section('title', 'Feedbacks')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Feedbacks</h1>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Feedbacks</h5>
                    </div>
                    <!-- Exibir Resultados do Formulário -->
                    <div class="">
                        <div class="p-5">
                            <h5 class="mb-3">Detalhes do Formulário:</h5>

                            @php
                                $couter = 1;
                            @endphp

                            @foreach ($feedbacks as $feedback)
                                <!-- Card para o Nome -->
                                <div class="card mb-3">
                                    <p class="px-3 pt-2" style="font-size: 1.5em; font-weight: bold;">#{{$couter}}</p>
                                    <div class="card-body">
                                        <h5 class="card-title">Nome</h5>
                                        <p class="card-text">{{ $feedback->name }}</p>
                                    </div>
                                </div>

                                <!-- Card para o Email -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Email</h5>
                                        <p class="card-text">{{ $feedback->email }}</p>
                                    </div>
                                </div>

                                <!-- Card para o Assunto -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Assunto</h5>
                                        <p class="card-text">{{ $feedback->topic }}</p>
                                    </div>
                                </div>

                                <!-- Card para a Mensagem -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Mensagem</h5>
                                        <p class="card-text">{{ $feedback->message }}</p>
                                    </div>
                                </div>

                                @php
                                    $couter++;
                                @endphp
                            @endforeach
                        </div>
                    </div>


                    <div class="mx-4 mt-2">
                        <p>Total: <b>{{ $feedbacksCount }} {{ Str::plural('feedback', $feedbacksCount) }}</b>
                        </p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $feedbacks->links() }}
                    </div>




                </div>

            </div>
        </div>
    </div>
@endsection
