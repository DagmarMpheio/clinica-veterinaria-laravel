@extends('layouts.backend.main')

@section('title', 'Editar Produto')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Editar</h1>
        {!! Form::model($product, [
            'method' => 'PUT',
            'autocomplete' => 'off',
            'route' => ['backend.products.update', $product->id],
            'files' => true,
            'id' => 'product-form',
        ]) !!}

        {{-- <p>{{$product->roles->first()->id}}</p> --}}

        @include('backend.products.form')
        {!! Form::close() !!}

    </div>
@endsection
