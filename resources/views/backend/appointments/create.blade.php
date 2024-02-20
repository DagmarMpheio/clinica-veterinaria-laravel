@extends('layouts.backend.main')

@section('title', 'Novo Agendamento')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <style>
        .fc-disabled-date {
            background-color: #ddd;
            pointer-events: none;
            /* Impede a seleção em datas desativadas */
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Novo Agendamento</h1>
        {!! Form::model($appointment, [
            'method' => 'POST',
            'autocomplete' => 'off',
            'route' => 'backend.appointments.store',
            'files' => true,
            'id' => 'appointment-form',
        ]) !!}

        @include('backend.appointments.form')

        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/pt-br.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.10/index.min.js"></script> --}}

    <!-- Tempus Dominus Bootstrap 4 para seleção de hora -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            $('#calendar').fullCalendar({
                selectable: true,
                select: function(start, end) {
                    // Actualiza o valor do campo oculto 'selected-date' com a data selecionada
                    $('#selected-date').val(moment(start).format('YYYY-MM-DD'));
                },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                eventLimit: true,
                events: '/backend/appointments-json',
                /* events: [
                    // Pode adicionar eventos já agendados aqui, se necessário
                ], */
                locale: 'pt-br',
                validRange: {
                    start: moment().format('YYYY-MM-DD'), // Desativa datas antes da data atual
                },
            });

            // Inicializar o Tempus Dominus para seleção de hora com restrições
            $('#timepicker').datetimepicker({
                format: 'HH:mm', // Formato desejado para a hora
                disabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 16, 17, 18, 19, 20, 21, 22,
                    23
                ], // Desativar horas específicas
                enabledHours: [8, 9, 10, 11, 12, 13, 14,
                    15
                ], // Habilitar apenas horas específicas
                stepping: 15, // Intervalo de minutos
            });

        });
    </script>

@endsection
