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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succès!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erreur!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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


            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit mb-0">
                                <h4>Tension</h4>
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
                                <h4>Indice de Masse Corporelle</h4>
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
                                <div class="mt-4">
                                    <h5>Votre IMC : {{ number_format($latestBMI, 1) }}</h5>
                                    <div class="progress weight-bar">
                                        <div class="progress-bar {{ $progressClass }}" role="progressbar"
                                            style="width: {{ ($latestBMI / 40) * 100 }}%"
                                            aria-valuenow="{{ $latestBMI }}" aria-valuemin="0" aria-valuemax="40"></div>
                                    </div>
                                    <ul class="weight-checkit mt-3">
                                        <li class="mx-auto">{{ $bmiCategory }}</li>
                                    </ul>
                                </div>
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
                                        alt>Poids </h4>
                            </div>
                            <div id="weight-chart"></div>
                            <div class="dash-content">
                                @if ($poids->isNotEmpty())
                                    <h5>{{ $poids->last() }} <span>Kg</span></h5>
                                    <!-- Vous pouvez ajouter la comparaison par rapport au mois dernier ici -->
                                @else
                                    <p>Aucune donnée de poids disponible.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        if ($('#weight-chart').length > 0) {
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
                                    name: "Poids",
                                    data: @json($poids)
                                }],
                                xaxis: {
                                    categories: @json($consultationDates)
                                },
                            };

                            var chart1 = new ApexCharts(document.querySelector("#weight-chart"), options);
                            chart1.render();
                        }
                    });
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
                            <div id="calendar-doctor1" class="calendar-container"> </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        // Configurer Moment.js pour utiliser le français
                        moment.locale('fr');

                        // Récupérer les rendez-vous depuis Blade
                        let appointments = @json(
                            $rdvs->map(function ($rdv) {
                                return [
                                    'date' => $rdv->date,
                                    'doctorName' => $rdv->doctor->name,
                                ];
                            }));

                        // Convertir les rendez-vous en événements pour simpleCalendar
                        let events = appointments.map(appointment => {
                            return {
                                startDate: moment(appointment.date).format('YYYY-MM-DDTHH:mm:ssZ'),
                                endDate: moment(appointment.date).add(1, 'hour').format(
                                    'YYYY-MM-DDTHH:mm:ssZ'), // Supposons une durée de 1 heure
                                summary: 'Rendez-vous avec ' + appointment.doctorName
                            };
                        });

                        $("#calendar-doctor1").simpleCalendar({
                            fixedStartDay: 0,
                            disableEmptyDetails: true,
                            events: events,
                            // Traduire les éléments de calendrier en français
                            lang: 'fr',
                            months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',
                                'Septembre', 'Octobre', 'Novembre', 'Décembre'
                            ],
                            days: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam']
                        });
                    });
                </script>

            </div>
        </div>
        <div class="sidebar-overlay" data-reff></div>


    @endsection
