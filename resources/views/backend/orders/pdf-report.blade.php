<!-- resources/views/pdf/invoice.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Arial, sans-serif';
        }

        .container {
            margin-top: 30px;
        }

        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-item {
            border-bottom: 1px solid #dee2e6;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div style="float: left;">
                <img src="img/app-logo.png" alt="VetCarePro" style="max-width: 100px;"/>
            </div>
            <div style="float: left; margin-left: 20px;">
                <h1 class="mb-4">VetCarePro</h1>
            </div>
            <div style="clear: both;"></div> <!-- Limpa o float para evitar problemas de layout -->

            <h1 class="mb-4">Comprovantivo de Compra</h1>
            <p>Pedido Nº: {{ $order->created_at->timestamp }}</p>
            <p>Cliente: {{ $order->user->name }}</p>
            <p>Data: {{ $order->created_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <h2 class="mt-4 mb-3">Produtos:</h2>
        <ul class="product-list">
            @foreach ($order->products as $product)
                <li class="product-item">
                    <span>{{ $product->name }} ({{ $product->pivot->quantity }}
                        {{ $product->pivot->quantity == 1 ? 'unidade' : 'unidades' }})</span>
                    <span>{{ number_format($product->price * $product->pivot->quantity, 2, ',', '.') }} kz</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            <p class="font-weight-bold">Total: {{ number_format($order->total, 2, ',', '.') }} kz</p>
        </div>
    </div>
</body>

</html>
