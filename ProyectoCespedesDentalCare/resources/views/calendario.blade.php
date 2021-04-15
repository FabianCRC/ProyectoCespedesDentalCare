@extends('layout')
<!--Hereda la navegacion-->

<head>
    <meta charset='utf-8' />

    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/list/main.css' rel='stylesheet' />
    <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/bootstrap/main.min.css' rel='stylesheet' />

    <script src='fullcalendar/core/main.js'></script>
    <script src='fullcalendar/daygrid/main.js'></script>
    <script src='fullcalendar/list/main.js'></script>
    <script src='fullcalendar/timegrid/main.js'></script>
    <script src='fullcalendar/core/locales/es.js'></script>
    <link href='fullcalendar/bootstrap/main.min.js' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locales: [ 'esLocale', 'frLocale' ],
                locale: 'es',
                defaultDate: Date.now(),
                allDaySlot: false,
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listMonth'
                },
                themeSystem: 'bootstrap',

                
                defaultView: 'dayGridMonth',
                navLinks: true, // can click day/week names to navigate views
                dateClick: function(info) {
                    $('#exampleModal').modal();
                    console.log(info);
                },
                /* events: [{
                      title: 'titulo',
                      start: '2021-04-04 11:00:00',
                      end: '2021-04-04 12:00:00'
                  }],*/
                events: '{{ route('Calendario.show', Auth::user()->id) }}',

            });
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
