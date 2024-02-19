@extends('layouts.site.app')

@section('title')
    Carrinho de Compras
@endsection

@section('content')
    <!--Carrinho de Compras-->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5">
                <h6 class="text-primary text-uppercase">Carrinho de Compras</h6>
                <h1 class="display-5 text-uppercase mb-0">Sua lista de produtos</h1>
            </div>

            @if (session('cart'))
            <table id="cart" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                        $subtotal = 0;
                    @endphp

                    @foreach (session('cart') as $id => $details)
                        @php
                            $subtotal = $details['price'] * $details['quantity'];
                        @endphp
                        <tr rowId="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="/img/products/{{ $details['image'] }}"
                                            class="card-img-top" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ number_format($details['price'], 2) }} kz</td>
                            <td data-th="Quantity">{{ $details['quantity'] }}</td>

                            <td data-th="Subtotal" class="text-center">{{ number_format($subtotal, 2) }} kz</td>
                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <!--Calcular o total-->
                        @php $total+=$subtotal @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <a href="{{ url('/products') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>
                                Continuar a Comprar</a>
                            @guest
                                <a class="btn btn-danger" href="{{ route('login') }}">Fazer Login para Finalizar compra</a>
                            @else
                                <a class="btn btn-danger" href="{{route('checkout')}}">Finalizar Compra</a>
                            @endguest
                        </td>
                        <td class="text-right" colspan="4" data-th="Total"><b>Total</b>: {{ number_format($total, 2) }} kz
                        </td>
                    </tr>
                </tfoot>
            </table>
            @else
            <div class="alert alert-warning">
                <p><b>O seu Carrinho está vazio.</b></p>
                <a href="{{route('products')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Fazer compras</a>
            </div>
            @endif
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(".edit-cart-info").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.shopping.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".delete-product").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Tem a certeza que deseja excluir?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
