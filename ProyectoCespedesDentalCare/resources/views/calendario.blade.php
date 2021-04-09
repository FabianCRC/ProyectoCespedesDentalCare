@extends('layout')
<!--Hereda la navegacion-->

<head>
    <meta charset='utf-8' />

    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />

    <script src='fullcalendar/core/main.js'></script>
    <script src='fullcalendar/daygrid/main.js'></script>
    <script src='fullcalendar/list/main.js'></script>
    <script src='fullcalendar/timegrid/main.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                defaultDate: Date.now(),
                allDaySlot: false,
                plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                dateClick: function(info) {
                    $('#exampleModal').modal();
                    console.log(info);
                },
              /* events: [{
                    title: 'titulo',
                    start: '2021-04-04 11:00:00',
                    end: '2021-04-04 12:00:00'
                }],*/
               events:'{{route('Calendario.show',Auth::user()->id)}}',
            });
            calendar.setOption('locale', 'es');
            calendar.render();
        });

    </script>
</head>
@section('Contenido')
<div class="form-group text-center">
    <h1>Calendario de citas</h1>
</div>
    <div class="container">
        <div id='calendar'></div>
    </div>
@endsection
