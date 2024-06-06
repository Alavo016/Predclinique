@extends('users.doctor.masterdoc')
@section('title', 'Dashboard Docteur')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Dashboard </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="feather-chevron-right"></i>
                            </li>
                            <li class="breadcrumb-item active">Doctor Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            <h2>Bonjour, <span>Dr.{{ $user->name }} {{ $user->prenom }}</span></h2>
                            <p>Passez une bonne journée au travail</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="{{ asset('assets/assets/img/morning-img-02.png') }}" alt />
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctor-list-blk">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget border-right-bg">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="{{ asset('assets/assets/img/icons/doctor-dash-01.svg') }}" alt />
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4>
                                    <span class="counter-up">{{ $nbrrdv }}</span><span>/85</span><span
                                        class="status-green">+60%</span>
                                </h4>
                                <h5>Rendez-Vous</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget border-right-bg">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="{{ asset('assets/assets/img/icons/doctor-dash-02.svg') }}" alt />
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4>
                                    <span class="counter-up">{{ $nbrUser }}</span><span>/125</span><span
                                        class="status-pink">-20%</span>
                                </h4>
                                <h5> Nbr Patient</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget border-right-bg">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="{{ asset('assets/assets/img/icons/doctor-dash-03.svg') }}" alt />
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4>
                                    <span class="counter-up">{{ $dispo }}</span><span>/30</span><span
                                        class="status-green">+40%</span>
                                </h4>
                                <h5>Nbr disponibilités</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="{{ asset('assets/assets/img/icons/doctor-dash-04.svg') }}" alt />
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4>
                                    <span class="counter-up">{{ $nbrConsultation }}</span><span></span><span
                                        class="status-green">+50%</span>
                                </h4>
                                <h5>Consultations</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit mb-0">
                                <h4>Rendez-vous par mois</h4>
                            </div>
                            <div id="apexcharts-area11"></div>
                        </div>
                    </div>
                    <script>
                        // Inclure cette section dans votre script JavaScript existant
                        document.addEventListener('DOMContentLoaded', function() {
                            if ($('#apexcharts-area11').length > 0) {
                                var options = {
                                    chart: {
                                        height: 350,
                                        type: 'bar'
                                    },
                                    series: [{
                                        name: 'Rendez-vous',
                                        data: @json($data)
                                    }],
                                    xaxis: {
                                        categories: @json($months)
                                    }
                                };

                                var chart = new ApexCharts(document.querySelector("#apexcharts-area11"), options);
                                chart.render();
                            }
                        });
                    </script>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-3 d-flex">
                    <div class="card">
                        <div class="card-body">
                            <div id="radial-patients1"></div>
                        </div>
                    </div>
                </div>
                <script>
                    // Inclure cette section dans votre script JavaScript existant
                    document.addEventListener('DOMContentLoaded', function() {
                        if ($('#radial-patients1').length > 0) {
                            var donutChart = {
                                chart: {
                                    height: 290,
                                    type: 'donut',
                                    toolbar: {
                                        show: false,
                                    }
                                },
                                plotOptions: {
                                    pie: {
                                        donut: {
                                            labels: {
                                                show: true,
                                                total: {
                                                    show: true,
                                                    label: 'Patients',
                                                    formatter: function(w) {
                                                        return w.globals.seriesTotals.reduce((a, b) => {
                                                            return a + b
                                                        }, 0)
                                                    }
                                                }
                                            }
                                        }
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                series: [{{ $malePatientsCount }}, {{ $femalePatientsCount }}],
                                labels: ['Male', 'Female'],
                                responsive: [{
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            width: 200
                                        },
                                        legend: {
                                            position: 'bottom'
                                        }
                                    }
                                }],
                                legend: {
                                    position: 'bottom'
                                }
                            };

                            var donut = new ApexCharts(document.querySelector("#radial-patients1"), donutChart);
                            donut.render();
                        }
                    });
                </script>
                <div class="col-12 col-md-12 col-lg-6 col-xl-2 d-flex">
                    <div class="struct-point">
                        <div class="card patient-structure">
                            <div class="card-body">
                                <h5>New Patients</h5>
                                <h3>
                                    {{ $newPatientsCount }}<span class="status-green"><img
                                            src="assets/img/icons/sort-icon-01.svg" alt
                                            class="me-1" />{{ round(($newPatientsCount / ($newPatientsCount + $oldPatientsCount)) * 100) }}%</span>
                                </h3>
                            </div>
                        </div>
                        <div class="card patient-structure">
                            <div class="card-body">
                                <h5>Old Patients</h5>
                                <h3>
                                    {{ $oldPatientsCount }}<span class="status-pink"><img
                                            src="assets/img/icons/sort-icon-02.svg" alt
                                            class="me-1" />{{ round(($oldPatientsCount / ($newPatientsCount + $oldPatientsCount)) * 100) }}%</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>



        <script src="{{ asset('assets/js/circle-progress.min.js') }}" type="75b6ca9e80d1ad3cb091b0cf-text/javascript"></script>

    @endsection
