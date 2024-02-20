@extends('layouts.backend.main')

@section('title', 'Editar Agendamento')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar Agendamento</h1>
        {!! Form::model($appointment, [
            'method' => 'PUT',
            'autocomplete' => 'off',
            'route' => ['backend.appointments.update', $appointment->id],
            'files' => true,
            'id' => 'appointment-form',
        ]) !!}

        {{-- <p>{{$appointment->roles->first()->id}}</p> --}}

        @include('backend.appointments.form')
        {!! Form::close() !!}

    </div>
@endsection
