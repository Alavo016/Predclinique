<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
    <link rel="icon" type="image/png"
        href="{{ asset('Blue_and_White_Illustrative_Doctor_Health_Care_Logo-removebg-preview.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/fullcalendar.min.css') }}">
    <!-- Inclure FullCalendar.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>
    <!-- Inclure le CSS de FullCalendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('style1.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/plugins/datatables/datatables.min.css') }}">
</head>

<body class="">
    <div class="main-wrapper">
        @include('users.doctor.header')
        @include('users.doctor.side')
        @yield('content')
    </div>
    <div class="sidebar-overlay" data-reff></div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('assets/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Lien CDN pour les boutons DataTables -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

     <script>

    </script>

    {{-- <script>
        // Fonction pour filtrer les résultats de la table en fonction de la recherche
        function filterTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("customSearchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".datatable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }

        // Écoutez les événements de saisie pour déclencher le filtrage automatique
        document.getElementById("customSearchInput").addEventListener("keyup", filterTable);
    </script> --}}

</body>

</html>
