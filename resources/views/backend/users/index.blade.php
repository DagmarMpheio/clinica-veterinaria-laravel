@extends('layouts.backend.main')

@section('title', 'Usuários')

@section('content')
    <div class="container-fluid p-0">

        @include('backend.partials.message')

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Usuários</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{ route('backend.users.create') }}" title="Novo Usuário">
                <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle"> Novo Usuário</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Usuários</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                                <th class="d-none d-xl-table-cell">Telefone</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                            $currentUser = auth()->user();
                        @endphp
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $user->email }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $user->phone }}</td>
                                    <td>
                                        <a href="{{ route('backend.users.edit', $user->id) }}"
                                            class="btn btn-primary-green" title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>

                                    <td>
                                        @if ($user->id == config('cms.default_user_id') || $user->id == $currentUser->id)
                                            <button onclick="return false" title="Excluír" type="submit"
                                                class="btn btn-dark text-white disabled">
                                                <i class="align-middle" data-feather="trash"></i> <span
                                                    class="align-middle">Excluir</span>
                                            </button>
                                        @else
                                            {!! Form::model($user, [
                                                'method' => 'DELETE',
                                                'route' => ['backend.users.destroy', $user->id],
                                            ]) !!}
                                                <button title="Excluír"
                                                    type="submit" class="btn btn-dark text-white">
                                                    <i class="align-middle" data-feather="trash"></i> <span
                                                        class="align-middle">Excluir</span>
                                                </button>
                                            
                                            {!! Form::close() !!}
                            
                                        @endif
                                    </td>



                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mx-4 mt-2">
                        <p>Total: <b>{{$usersCount}} {{ Str::plural('usuário', $usersCount)}}</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
