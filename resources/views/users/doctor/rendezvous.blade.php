@extends('users.doctor.masterdoc')

@section('title', 'Rendez-vous')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('doctor.dashboard') }}">Doctor Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="feather-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item active">Rendez-vous</li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-session />

            <div id="calendar"></div>

            <div id="rendezvous-list">
                <h2>Rendez-vous d'aujourd'hui</h2>
                <ul id="rendezvous-items"></ul>
            </div>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const rendezvousList = document.getElementById('rendezvous-items');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                buttonText: {
                    today: 'Aujourd\'hui',
                    month: 'Mois',
                    week: 'Semaine',
                    day: 'Jour',
                    list: 'Liste'
                },
                events: '{{ route('doctor.rendezvous.events') }}',
                eventClick: function(info) {
                    alert('Event: ' + info.event.title);
                    info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                },
                eventRender: function(info) {
                    if (info.event.start.toDateString() === new Date().toDateString()) {
                        const item = document.createElement('li');
                        const button = document.createElement('button');
                        button.textContent = 'Terminer';
                        button.classList.add('btn', 'btn-danger');
                        button.addEventListener('click', function() {
                            alert('Terminer rendez-vous: ' + info.event.title);
                        });
                        item.textContent = info.event.title;
                        item.appendChild(button);
                        rendezvousList.appendChild(item);
                    }
                }
            });

            calendar.render();
        });
    </script>
@endsection
