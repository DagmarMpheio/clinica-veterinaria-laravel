<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VetCarePro - Agendamento</title>

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

        .header {
            background-color: #4CAF50;
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

        .card-header {
            background-color: #4CAF50;
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

        .card-body p b {
            color: #4CAF50;
        }
    </style>
</head>

<body>

    <!--  CORPO DO EMAIL AQUI -->
    <div class="container">
        <center><img src="https://i.imgur.com/qpyuyjK.png" alt="VetCarePro - Logo" style="max-width: 100px;"></center>
        <div class="header">Agendamento Efetuado Com Sucesso</div>
        <div class="content">
            <div class="card">
                <div class="card-header">Detalhes do Agendamento</div>
                <div class="card-body">
                    <p>Caro(a) {{ $appointment->user->name }}, a sua marcação foi efectuada com sucesso.</p>
                    <p><b>Animal: </b>{{ $appointment->animal->name }}</p>
                    <p><b>Serviço de Agendamento: </b>{{ $appointment->type }}</p>
                    <p><b>Data do Agendamento: </b> {{ $appointment->date }}</p>
                    <p><b>Hora do Agendamento: </b>{{ $appointment->time}}</p>
                    <p><b>Referência: </b> {{ $appointment->created_at->timestamp }}</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
