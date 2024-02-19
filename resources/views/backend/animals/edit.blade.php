@extends('layouts.backend.main')

@section('title', 'Editar Animal')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar Animal</h1>
        {!! Form::model($animal, [
            'method' => 'PUT',
            'autocomplete' => 'off',
            'route' => ['backend.animals.update', $animal->id],
            'files' => true,
            'id' => 'animal-form',
        ]) !!}

        {{-- <p>{{$animal->roles->first()->id}}</p> --}}

        @include('backend.animals.form')
        {!! Form::close() !!}

    </div>
@endsection
