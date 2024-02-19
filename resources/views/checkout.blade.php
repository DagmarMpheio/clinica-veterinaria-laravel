@extends('layouts.site.app')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <h3>Produtos no Carrinho</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $product)
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="/img/products/{{ $product['image'] }}" class="card-img-top" height="50"/>
                                                </div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $product['name'] }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>{{ $product['price'] }} kz</td>
                                    <td>{{ $product['quantity'] * $product['price'] }} kz</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3>Total a ser Pago</h3>
                    <p style="font-size: 2rem;">{{ $total }} kz</p>

                    <form method="post" action="{{ route('checkout') }}">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="payment_method">Forma de Pagamento:</label>
                            <select name="payment_method" class="form-control"  id="payment_method" required>
                                <option value="" disabled selected>Selecione a forma de pagamento</option>
                                <option value="Cartão de Crédito">Cartão de Crédito</option>
                                <option value="Cartão de Débito">Cartão de Débito</option>
                                <option value="Transferência Bancária">Transferência Bancária</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
