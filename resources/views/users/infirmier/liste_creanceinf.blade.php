@extends('users.infirmier.masterinf')

<link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap-datetimepicker.min.css') }}">
@section('title', 'Liste des Créances')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('infirmier.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Liste des Créances</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-lg-12">
                    <div class="card card-table show-entire">
                        <div class="card-body">
                            <div class="page-table-header mb-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="doctor-table-blk">
                                            <h3>Liste des Créances</h3>
                                            <div class="doctor-search-blk mt-2 mt-md-0">
                                                <div class="top-nav-search table-search-blk">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search here" id="customSearchInput">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-secondary" type="button" id="searchButton">
                                                                <img src="{{ asset('assets/assets/img/icons/search-normal.svg') }}" alt="Search">
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 datatable custom-table comman-table mb-0 p-3">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Patient</th>
                                            <th>Montant Total</th>
                                            <th>Date</th>
                                            <th>Montant Restant</th>
                                            <th>Montant Payé</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($creances as $creance)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td>{{ $creance->id }}</td>
                                                <td>{{ $creance->user->name }} {{ $creance->user->prenom }}</td>
                                                <td>{{ $creance->montant_tot }} FCA</td>
                                                <td>{{ $creance->date }}</td>
                                                <td>{{ $creance->montant_res }} FCA</td>
                                                <td>{{ $creance->montant_paye }} FCA</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('Creance.edit', $creance->id) }}"
                                                            class="btn btn-success" title="Modifier">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('Creance.destroy', $creance->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" title="Supprimer">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
    </div>

@endsection
