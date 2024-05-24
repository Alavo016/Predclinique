@extends('users.patient.masterpat')

@section('title', 'Liste des Créances')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route("patient.index") }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Liste des Créances</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Créances</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Montant Total</th>
                                            <th>Date</th>
                                            <th>Montant Payé</th>
                                            <th>Montant Restant</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($creances as $creance)
                                        <tr>
                                            <td>{{ $creance->id }}</td>
                                            <td>{{ $creance->montant_tot }}</td>
                                            <td>{{ $creance->date }}</td>
                                            <td>{{ $creance->montant_paye }}</td>
                                            <td style="background-color: #de5757;">{{ $creance->montant_res }}</td>
                                            
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{-- Bouton "Précédent" --}}
                                        <li class="page-item {{ $creances->previousPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $creances->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Précédent</a>
                                        </li>
                                        {{-- Boucle sur les numéros de page --}}
                                        @for ($i = 1; $i <= $creances->lastPage(); $i++)
                                            <li class="page-item {{ $i === $creances->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $creances->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        {{-- Bouton "Suivant" --}}
                                        <li class="page-item {{ $creances->nextPageUrl() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $creances->nextPageUrl() }}">Suivant</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
