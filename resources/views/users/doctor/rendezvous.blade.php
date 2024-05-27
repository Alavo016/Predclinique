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
    </div>
</div>

<script type="module">
    import { Calendar } from '/node_modules/@fullcalendar/core/main.esm2015.js';
    import dayGridPlugin from '/node_modules/@fullcalendar/daygrid/main.esm2015.js';
    import timeGridPlugin from '/node_modules/@fullcalendar/timegrid/main.esm2015.js';
    import interactionPlugin from '/node_modules/@fullcalendar/interaction/main.esm2015.js';

    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialView: 'dayGridMonth',
            events: '{{ route('doctor.rendezvous.events') }}',
            editable: false,
            droppable: false
        });
        calendar.render();
        });
</script>
@endsection
