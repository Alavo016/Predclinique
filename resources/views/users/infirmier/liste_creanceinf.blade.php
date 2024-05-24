@extends('users.patient.masterpat')

@section('title', 'Liste des Créances')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('infirmier.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Liste des Créances</li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="{{ route('ajtdoc') }}" class="btn btn-primary  mb-2">Ajouter</a>
            <x-session />
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Créances</h5>
                            
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
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
                                                <td>{{ $creance->id }}</td>
                                                <td>{{ $creance->user->name }} {{ $creance->user->prenom }}</td>
                                                <td>{{ $creance->montant_tot }} FCA</td>
                                                <td>{{ $creance->date }}</td>
                                                <td>{{ $creance->montant_res }} FCA</td>
                                                <td>{{ $creance->montant_paye }} FCA</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('Creance.edit', $creance->id) }}"
                                                            class="btn btn-primary" title="Modifier"><i
                                                                class="fa fa-edit"></i></a>
                                                        <form action="{{ route('Creance.destroy', $creance->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                title="Supprimer"><i class="fa fa-trash"></i></button>
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
