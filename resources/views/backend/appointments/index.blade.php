@extends('layouts.backend.main')

@section('title', 'Agendamentos')

@section('style')
    <style>
        .appointment-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Agendamentos</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{ route('backend.appointments.create') }}"
                title="Novo Agendamento">
                <i class="align-middle" data-feather="plus"></i> <span class="align-middle"> Novo Agendamento</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Agendamentos</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo</th>
                                <th>Data/Hora</th>
                                <th>Animal</th>
                                @if (Auth::user()->hasRole('admin'))
                                    <th>Cliente</th>
                                @endif
                                <th colspan="2">Acção</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $appointment->type }}</td>
                                    <td>
                                        {{ $appointment->date }} {{ $appointment->time }}
                                    </td>
                                    <td>{{ $appointment->animal->name }}</td>
                                    @if (Auth::user()->hasRole('admin'))
                                        <td>{{ $appointment->user->name }}</td>
                                    @endif
                                    {{--  <td>
                                        <a href="{{ route('backend.appointments.edit', $appointment) }}"
                                            class="btn btn-primary-green" title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td> --}}

                                    <td>
                                        {!! Form::model($appointment, [
                                            'method' => 'DELETE',
                                            'route' => ['backend.appointments.destroy', $appointment->id],
                                        ]) !!}
                                        <button title="Excluír" type="submit" class="btn btn-dark text-white">
                                            <i class="align-middle" data-feather="trash"></i>
                                            <span class="align-middle">Excluir</span>
                                        </button>

                                        {!! Form::close() !!}

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mx-4 mt-2">
                        <p>Total: <b>{{ $appointmentsCount }} {{ Str::plural('agendamento', $appointmentsCount) }}</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $appointments->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
