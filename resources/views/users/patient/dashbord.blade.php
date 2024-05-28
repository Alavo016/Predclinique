@extends('users.patient.masterpat')

@section('title', 'Dashboard Patient')
@section('content')
    use Carbon\Carbon;

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
<x-session/>

            <div class="row">
                <div class="col-12 col-md-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title d-inline-block">Rendez-vous</h4>
                                </div>
                                <div class="card-body p-0 table-dash">
                                    <div class="table-responsive">
                                        <table class="table mb-0 border-0 datatable custom-table patient-table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check check-tables">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="something">
                                                        </div>
                                                    </th>
                                                    <th>Docteur</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Heure</th>
                                                    <th>Prix</th>
                                                    <th>Payement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rdvs as $index => $rendezVous)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check check-tables">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="something">
                                                            </div>
                                                        </td>
                                                        <td class="table-image">
                                                            <img width="28" height="28" class="rounded-circle"
                                                                src="assets/img/profiles/avatar-02.jpg" alt>
                                                            <h2>{{ $doctorNames[$index] }}</h2>
                                                        </td>
                                                        <td
                                                            style="{{ $rendezVous->statut === 'Rdv Pris' ? 'background-color: rgba(59, 235, 59, 0.541); color: black;' : 'background-color: rgba(255, 0, 0, 0.393); color: black;' }}">
                                                            {{ $rendezVous->statut }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($rendezVous->date)->format('d.m.Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($rendezVous->date)->format('H:i') }}
                                                        </td>
                                                        <td>{{ $rendezVous->prix }} F CFA</td>
                                                        <td
                                                            style="{{ $rendezVous->statut_paiement === 'Accepté' ? 'background-color: rgba(59, 235, 59, 0.541); color: black;' : 'background-color: rgba(255, 0, 0, 0.393); color: black;' }}">
                                                            {{ $rendezVous->statut_paiement }}
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

            </div>

        </div>

    </div>

    </div>
    <div class="sidebar-overlay" data-reff></div>


    <script src="{{ asset('assets/js/circle-progress.min.js') }}" type="75b6ca9e80d1ad3cb091b0cf-text/javascript"></script>
    {{-- <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('.datatable')) {
                $('.datatable').DataTable();
            }
        });
    </script> --}}
@endsection
