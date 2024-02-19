<!-- resources/views/pdf/invoice.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
            <h1 class="mb-4">Comprovantivo de Compra</h1>
            <p>ID da Ordem: {{ $order->id }}</p>
            <p>Cliente: {{ $order->user->name }}</p>
        </div>

        <h2 class="mt-4 mb-3">Produtos:</h2>
        <ul class="product-list">
            @foreach($order->products as $product)
                <li class="product-item">
                    <span>{{ $product->name }} ({{ $product->pivot->quantity }} unidades)</span>
                    <span>R$ {{ number_format($product->price * $product->pivot->quantity, 2, ',', '.') }}</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            <p class="font-weight-bold">Total: R$ {{ number_format($order->total, 2, ',', '.') }}</p>
        </div>
    </div>
</body>
</html>
