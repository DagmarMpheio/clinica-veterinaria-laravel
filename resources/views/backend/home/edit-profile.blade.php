@extends('layouts.backend.main')

@section('title', 'Editar Perfil')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Editar Perfil</h1>
        </div>
       
            <form action="{{route('update-account')}}" method="post" class="row">
                @method('PUT')
                @csrf
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Nome</h5>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" value=" {{$user->name}}" name="name" placeholder="Nome">
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Email</h5>
                    </div>
                    <div class="card-body">
                        <input type="email" class="form-control"   value=" {{$user->email}}" name="email" placeholder="Email">
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Telefone</h5>
                    </div>
                    <div class="card-body">
                        <input type="tel" class="form-control"  value=" {{$user->telefone}}" name="telefone" placeholder="Telefone">
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Morada</h5>
                    </div>
                    <div class="card-body">
                        <input type="address" class="form-control"  value=" {{$user->endereco}}" name="endereco" placeholder="Morada">
                    </div>
                </div>
                
            </div>

            <div class="col-12 col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sobre Mim</h5>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" name="bio" rows="2" placeholder="Textarea">{{$user->bio}}</textarea>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Gênero</h5>
                    </div>
                    <div class="card-body">
                        <div>
                           
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="Masculino" name="genero"
                                {{$user->genero == 'Masculino' ? 'checked' : ' ' }} >
                                <span class="form-check-label">
                                    Masculino
                                </span>
                            </label>
                           
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="Femenino" name="genero" {{$user->genero == 'Femenino' ? 'checked' : ' ' }} >
                                <span class="form-check-label">
                                Femenino
                                </span>
                            </label>
                            
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary-yellow">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>

             

            </div>
        
        </form>
        

    </div>
@endsection
