@extends('layouts.site.app')

@section('title') Produtos @endsection

@section('content')
<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Produtos</h6>
            <h1 class="display-5 text-uppercase mb-0">Produtos Para Os Seus Melhores Amigos</h1>
        </div>
        <div class="owl-carousel product-carousel">
            @foreach ($products as $product)
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="img/products/{{$product->image}}" alt="">
                        <h6 class="text-uppercase">{{$product->name}}</h6>
                        <h5 class="text-primary mb-0">{{$product->formatPrice($product->price)}} kz</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="#"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="#"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Products End -->

<!-- Offer Start -->
<div class="container-fluid bg-offer my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5 justify-content-start">
            <div class="col-lg-7">
                <div class="border-start border-5 border-dark ps-5 mb-5">
                    <h6 class="text-dark text-uppercase">Oferta Especial</h6>
                    <h1 class="display-5 text-uppercase text-white mb-0">Poupe 50% em todos os artigos na sua primeira encomenda</h1>
                </div>
                <p class="text-white mb-4">Economize 50% em todos os artigos na sua primeira encomenda. Aproveite essa oferta especial para cuidar do seu animal de estimação com qualidade e economia!</p>
                <a href="#" class="btn btn-light py-md-3 px-md-5 me-3">Comprar Agora</a>
                <a href="#" class="btn btn-outline-light py-md-3 px-md-5">Ler Mais</a>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->

@endsection