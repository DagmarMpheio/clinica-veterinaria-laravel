@extends('layouts.site.app')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">{{ $product->name }}</h6>
                <h1 class="display-5 text-uppercase mb-0">Produtos Para Os Seus Melhores Amigos</h1>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="img-fluid" src="/img/products/{{ $product->image }}" alt="{{ $product->name }}">
                    </div>
                    <div class="col-lg-8">
                        <h2 class="mb-4">{{ $product->name }}</h2>
                        <p class="text-primary h4">{{ $product->formatPrice($product->price) }} kz</p>
                        <p class="mt-4" style="text-align: justify;">{{ $product->description }}</p>
                        <div class="mt-4">
                            <a class="btn btn-primary py-2 px-3" href="{{ route('addproduct.to.cart', $product->id) }}">
                                <i class="bi bi-cart-fill me-2"></i> Adicionar ao Carrinho
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    <!-- Products End -->
@endsection
