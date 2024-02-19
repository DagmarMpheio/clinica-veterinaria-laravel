@extends('layouts.backend.main')

@section('title', 'Produtos')

@section('style')
<style>
    .product-image{
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Produtos</h1>
            <a class="badge bg-dark text-white ms-2 p-2" href="{{ route('backend.products.create') }}" title="Novo Produto">
                <i class="align-middle" data-feather="plus"></i> <span class="align-middle"> Novo Produto</span>
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Produtos</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th class="d-none d-xl-table-cell">Preço</th>
                                <th class="d-none d-xl-table-cell">Estoque</th>
                                <th colspan="2">Acções</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td><img src="/img/products/{{$product->image}}" alt="{{$product->name}}" class="product-image"></td>
                                    <td>{{ $product->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{$product->formatPrice($product->price)}} kz</td>
                                    <td class="d-none d-xl-table-cell">{{ $product->stock }}</td>
                                    <td>
                                        <a href="{{ route('backend.products.edit', $product) }}"
                                            class="btn btn-primary-green" title="Editar">
                                            <i class="align-middle" data-feather="edit"></i> <span
                                                class="align-middle">Editar</span>
                                        </a>
                                    </td>

                                    <td>
                                        {!! Form::model($product, [
                                                'method' => 'DELETE',
                                                'route' => ['backend.products.destroy', $product->id],
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
                        <p>Total: <b>{{$productsCount}} {{ Str::plural('produto', $productsCount)}}</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
