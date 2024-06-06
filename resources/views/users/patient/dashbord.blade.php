@extends('users.patient.masterpat')

@section('title', 'Dashboard Patient')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('patient.index') }}">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Patient Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            <h2>Good Morning, <span>{{ $user->name }}</span></h2>
                            <p>Have a nice day at work</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="{{ asset('assets/assets/img/morning-img-03.png') }}" alt>
                        </div>
                    </div>
                </div>
            </div>
            <x-session />

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit mb-0">
                                <h4>Statistiques de votre Santé</h4>
                                <div class="input-block mb-0">
                                    <select class="form-control select" id="yearSelect">
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                            </div>
                            <div id="health-chart1"></div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var tensions = @json($tensions);

                        var options = {
                            chart: {
                                height: 170,
                                type: 'line',
                                toolbar: {
                                    show: false
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            series: [{
                                name: 'Tension',
                                color: '#00D3C7',
                                data: tensions
                            }],
                            xaxis: {
                                categories: @json($rdvs->pluck('date')),
                            },
                        };
                        var chart = new ApexCharts(document.querySelector("#health-chart1"), options);
                        chart.render();

                        document.getElementById('yearSelect').addEventListener('change', function() {
                            // Gérer le changement d'année ici
                        });
                    });
                </script>

                <div class="col-12 col-md-12 col-lg-12 col-xl-5 d-flex">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Body Mass Index</h4>
                            </div>
                            <div class="body-mass-blk">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="weight-blk">
                                            <div class="center slider">
                                                <div class="d-flex justify-content-between">
                                                    <div class="me-2">
                                                        <h4>{{ number_format($latestWeight - 1, 1) }}</h4>
                                                        <span>kg</span>
                                                    </div>
                                                    <div class="me-2">
                                                        <h4>{{ $latestWeight }}</h4>
                                                        <span>kg</span>
                                                    </div>
                                                    <div class="me-2">
                                                        <h4>{{ number_format($latestWeight + 1, 1) }}</h4>
                                                        <span>kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="weight-blk">
                                            <div class="center slider">
                                                <div class="d-flex justify-content-between">
                                                    <div class="me-2">
                                                        <h4>{{ number_format($latestHeight - 0.1, 1) }}</h4>
                                                        <span>m</span>
                                                    </div>
                                                    <div class="me-2">
                                                        <h4>{{ $latestHeight }}</h4>
                                                        <span>m</span>
                                                    </div>
                                                    <div class="me-2">
                                                        <h4>{{ number_format($latestHeight + 0.1, 1) }}</h4>
                                                        <span>m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress weight-bar">
                                    <div class="progress-bar progress-bar-success" role="progressbar"></div>
                                </div>
                                <ul class="weight-checkit">
                                    <li class="mx-auto">{{ $bmiCategory }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-xl-3 d-flex">
                    <div class="card report-blk">
                        <div class="card-body">
                            <div class="report-head">
                                <h4><img src="{{ asset('assets/assets/img/icons/report-icon-01.svg') }}" class="me-2"
                                        alt>Heart Rate</h4>
                            </div>
                            <div id="heart-rate"></div>
                            <div class="dash-content">
                                <h5>{{ $tensions->last() }} <span>bpm</span></h5>
                                <!-- Vous pouvez ajouter la comparaison par rapport au mois dernier ici -->
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    if ($('#heart-rate').length > 0) {
                        var options = {
                            chart: {
                                height: 200,
                                type: "line",
                                toolbar: {
                                    show: false
                                },
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: "smooth"
                            },
                            series: [{
                                name: "Health",
                                color: '#FF3667',
                                data: @json($tensions)
                            }],
                            xaxis: {
                                categories: @json($rdvs->pluck('date'))
                            },
                        };
                        var chart = new ApexCharts(document.querySelector("#heart-rate"), options);
                        chart.render();
                    }
                </script>

                <div class="col-12 col-md-6 col-xl-3 d-flex">
                    <div class="card report-blk">
                        <div class="card-body">
                            <div class="report-head">
                                <h4><img src="{{ asset('assets/assets/img/icons/report-icon-02.svg') }}" class="me-2"
                                        alt>Temperature</h4>
                            </div>
                            <div id="temperature-chart1"></div>
                            <div class="dash-content">
                                <h5 id="latest-temperature"></h5>
                                <!-- Vous pouvez ajouter la comparaison par rapport au mois dernier ici -->
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        if ($('#temperature-chart1').length > 0) {
                            var temperatures = @json($temperatures);
                            var latestTemperature = temperatures[temperatures.length - 1];
                            document.getElementById('latest-temperature').innerHTML = latestTemperature +
                                ' <span>&#8451;</span>';

                            var options = {
                                chart: {
                                    height: 230,
                                    type: 'bar',
                                    stacked: false,
                                    toolbar: {
                                        show: false
                                    },
                                },
                                responsive: [{
                                    breakpoint: 480,
                                    options: {
                                        legend: {
                                            position: 'bottom',
                                            offsetX: -10,
                                            offsetY: 0
                                        }
                                    }
                                }],
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: '90%',
                                    },
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    show: true,
                                    width: 1,
                                    colors: ['transparent']
                                },
                                series: [{
                                    name: 'Temperature',
                                    color: "#fd5000ea",
                                    data: temperatures
                                }],
                                xaxis: {
                                    categories: @json($consultationDates)
                                },
                            };
                            var chart = new ApexCharts(document.querySelector("#temperature-chart1"), options);
                            chart.render();
                        }
                    });
                </script>

                <div class="col-12 col-md-12 col-xl-6">
                    <div class="card flex-fill mb-2">
                        <div class="card-body">
                            <div id="calendar-doctor1" class="calendar-container" > </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $("#calendar-doctor1").simpleCalendar({
                            fixedStartDay: 0,
                            disableEmptyDetails: true,
                            events: [{
                                    startDate: new Date(new Date().setHours(new Date().getHours() + 24))
                                        .toDateString(),
                                    endDate: new Date(new Date().setHours(new Date().getHours() + 25))
                                    .toISOString(),
                                    summary: 'Conference with teachers'
                                },
                                {
                                    startDate: new Date(new Date().setHours(new Date().getHours() - new Date()
                                        .getHours() - 12, 0)).toISOString(),
                                    endDate: new Date(new Date().setHours(new Date().getHours() - new Date()
                                        .getHours() - 11)).getTime(),
                                    summary: 'Old classes'
                                },
                                {
                                    startDate: new Date(new Date().setHours(new Date().getHours() - 48))
                                        .toISOString(),
                                    endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
                                    summary: 'Old Lessons'
                                }
                            ],
                        });
                    });
                </script>
            </div>
            <div class="col-6 col-md-12 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block text-primary" >Rendez-vous</h4>
                        <a href="appointments.html" class="patient-views float-end">Afficher tous</a>
                    </div>
                    <div class="card-body p-0 table-dash">
                        <div class="table-responsive">
                            <table class="table mb-0 border-0  custom-table patient-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Médecin</th>
                                        <th>Date</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rdvs as $rdv)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td class="table-image">
                                            <!-- Supposons que vous stockiez les noms et les photos des médecins dans des tableaux -->
                                            <img width="28" height="28" class="rounded-circle" src="{{ asset($doctorPhotos[$loop->index]) }}" alt="">
                                            <h2>{{ $doctorNames[$loop->index] }}</h2>
                                        </td>
                                        <td>{{ $rdv->date }}</td>
                                        <td><button class="custom-badge status-gray re-shedule">Reschedule</button></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-appointment.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="sidebar-overlay" data-reff></div>


@endsection
