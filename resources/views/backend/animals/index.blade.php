@extends('layouts.backend.main')

@section('title', 'Animais')

@section('style')
<style>
    .animal-image{
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Animais</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{ route('backend.animals.create') }}" title="Novo Animal">
                <i class="align-middle" data-feather="plus"></i> <span class="align-middle"> Novo Animal</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Animais</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th class="d-none d-xl-table-cell">Espécie</th>
                                <th class="d-none d-xl-table-cell">Raça</th>
                                <th>Proprietário</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($animals as $animal)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td><img src="/img/animals/{{$animal->image}}" alt="{{$animal->name}}" class="animal-image"></td>
                                    <td>{{ $animal->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{$animal->specie}}</td>
                                    <td class="d-none d-xl-table-cell">{{ $animal->race }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $animal->owner->name }}</td>
                                    <td>
                                        <a href="{{ route('backend.animals.edit', $animal) }}"
                                            class="btn btn-primary-green" title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>

                                    <td>
                                        {!! Form::model($animal, [
                                                'method' => 'DELETE',
                                                'route' => ['backend.animals.destroy', $animal->id],
                                        ]) !!}
                                            <button title="Excluír"
                                                type="submit" class="btn btn-dark text-white">
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
                        <p>Total: <b>{{$animalsCount}} {{$animalsCount == 1 ? 'animal' : 'animais'}} </b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $animals->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
