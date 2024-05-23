@extends('users.infirmier.masterinf')
@section('title', 'Dashboard Docteur')
@section('content')
    <div class="page-wrapper">
        
        
    </div>

    <script>
        // Dans ta vue

        var ctx3 = document.getElementById('chartBar3').getContext('2d');
        var gradient = ctx3.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, '#44c4fa');
        gradient.addColorStop(1, '#664dc9');
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Créances',
                    data: {!! json_encode($data) !!},
                    backgroundColor: gradient
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 10,
                            // max: 80
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        });

       
        var datapie = {
            labels: {!! json_encode($labelsDonut) !!},
            datasets: [{
                data: {!! json_encode($numberOfFournituresArray) !!},
                backgroundColor: ['#664dc9', '#44c4fa', '#38cb89', '#3e80eb', '#ffab00',
                    '#ef4b4b'] // Couleurs pour chaque segment
            }]
        };
        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true,
                position: 'bottom' // Position de la légende

            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        // For a doughnut chart
        var ctx6 = document.getElementById('chartPie');
        var myPieChart6 = new Chart(ctx6, {
            type: 'doughnut',
            data: datapie,
            options: optionpie
        });
    </script>


    <script src="{{ asset('assets/js/circle-progress.min.js') }}" type="75b6ca9e80d1ad3cb091b0cf-text/javascript"></script>

@endsection
