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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#calendar').fullCalendar({
                selectable: true,
                select: function (start, end) {
                    // Atualiza o valor do campo oculto 'selected-date' com a data selecionada
                    $('#selected-date').val(moment(start).format('YYYY-MM-DD'));
                },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                eventLimit: true,
                events: '/appointments-json',
                /* events: [
                    // Pode adicionar eventos já agendados aqui, se necessário
                ], */
                locale: 'pt-br',
                validRange: {
                    start: moment().format('YYYY-MM-DD'), // Desativa datas antes da data atual
                },
                dayRender: function (date, cell) {
                    var currentDate = moment(date).format('YYYY-MM-DD');

                    // Verifica se há eventos para a data actual
                    var events = $('#calendar').fullCalendar('clientEvents', function (event) {
                        return event.start.format('YYYY-MM-DD') === currentDate;
                    });

                    // Desativa a seleção se houver eventos para a data actual
                    if (events.length > 0) {
                        cell.addClass('fc-disable-select');
                    }
                },
            });
        });
    </script>

@endsection
