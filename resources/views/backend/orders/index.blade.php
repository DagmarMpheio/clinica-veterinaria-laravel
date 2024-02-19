@extends('layouts.backend.main')

@section('title', 'Pedidos')

@section('style')
    <style>
        .product-image {
            width: 100px;
            height: 50px;
            border-radius: 50%;
        }

        ul {
            list-style-type: none; /* Remove os pontos de lista */
            padding: 0; /* Remove o preenchimento padrão da lista */
        }

        li {
            margin-bottom: 10px; /* Adiciona algum espaçamento entre os itens da lista */
            display: flex; /* Torna os itens da lista em linha (horizontal) */
            align-items: center; /* Alinha verticalmente os itens da lista ao centro */
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Todos Pedidos</h1>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Pedidos</h5>
                    </div>
                    <table class="table table-hover table-striped my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>Data</th>
                                <th>Forma de Pagamento</th>
                                <th>Produtos</th>
                                <th>Comprovantivo</th>
                            </tr>
                        </thead>
                        @php
                            $counter = 1;
                        @endphp
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ number_format($order->total,2) }} kz</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#products_{{ $order->id }}">Ver Produtos</button>
                                    <div id="products_{{ $order->id }}" class="collapse">
                                        <ul>
                                            @foreach($order->products as $product)
                                            <li>
                                                <div class="row">
                                                    <img src="/img/products/{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                                                {{ $product->name }} ({{ $product->pivot->quantity }})
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{route('generate.pdf',$order)}}" target="_blank">
                                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Baixar</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="mx-4 mt-2">
                        <p>Total: <b>{{ $ordersCount }} {{ Str::plural('pedido', $ordersCount) }}</b></p>
                    </div>
                    <!-- Mostrar links de paginacao -->
                    <div class="p-4">
                        {{ $orders->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
