<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cival SA - Agendamento</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .header-success {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .header-danger {
            background-color: #f52c2c;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content {
            padding: 0 20px;
            color: #333;
        }

        .content p {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .content p b {
            color: #4CAF50;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header-success {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-header-danger {
            background-color: #f52c2c;
            color: #fff;
            padding: 10px 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-body p {
            margin-bottom: 8px;
        }

        .card-body-danger{
            color: #f52c2c;
        }

        .card-body-success{
            color: #4CAF50;
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

    <!--  CORPO DO EMAIL AQUI -->
    <div class="container">
        <center><img src="https://i.imgur.com/qpyuyjK.png" alt="VetCarePro - Logo" style="max-width: 100px;"></center>
        <div class="{{$order->status=='Rejeitado'?'header-danger':'header-success'}}">Pedido {{ $order->status }}</div>
        <div class="content">
            <div class="card">
                <div class="{{$order->status=='Rejeitado'?'card-header-danger':'card-header-success'}}">Detalhes do Pedido</div>
                <div class="{{$order->status=='Rejeitado'?'card-body-danger':'card-body-success'}}" >
                    <p>Caro {{ $order->user->name }}, a seu pedido foi {{ $order->status }}.</p>
                    <p>Pedido Nº: {{ $order->created_at->timestamp }}</p>
                    <p>Cliente: {{ $order->user->name }}</p>
                    <p>Data: {{ $order->created_at->format('d/m/Y H:i:s') }}</p>

                    <h2 class="mt-4 mb-3">Produtos:</h2>
                    <ul class="product-list">
                        @foreach ($order->products as $product)
                            <li class="product-item">
                                <span>{{ $product->name }} ({{ $product->pivot->quantity }}
                                    {{ $product->pivot->quantity == 1 ? 'unidade' : 'unidades' }})</span>
                                <span>{{ number_format($product->price * $product->pivot->quantity, 2, ',', '.') }}
                                    kz</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-4">
                        <p class="font-weight-bold">Total: {{ number_format($order->total, 2, ',', '.') }} kz</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
