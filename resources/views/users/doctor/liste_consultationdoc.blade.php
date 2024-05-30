@extends("users.doctor.masterdoc")

@section('title', 'Consultations du Docteur')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Consultations du Docteur</li>
                    </ul>
                </div>
            </div>
        </div>
        <x-session />
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table show-entire">
                    <div class="card-body">
                        <div class="page-table-header mb-2">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="doctor-table-blk">
                                        <h3>Liste des Consultations</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="consultationsTable" class="table table-hover border-0 custom-table comman-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Date</th>
                                        <th>Motif</th>
                                        <th>Symptômes</th>
                                        <th>Diagnostic</th>
                                        <th>Heure de Fin</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultations as $consultation)
                                        <tr>
                                            <td>
                                                @if ($consultation->patient)
                                                    <a href="{{ route('doc.dossier', $consultation->patient->id) }}">
                                                        <img width="28" height="28" src="{{ asset($consultation->patient->photo) }}" class="rounded-circle m-r-5">
                                                        {{ $consultation->patient->name }} {{ $consultation->patient->prenom }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">Patient non trouvé</span>
                                                @endif
                                            </td>
                                            <td>{{ $consultation->date }}</td>
                                            <td>{{ $consultation->motif }}</td>
                                            <td>{{ $consultation->symptomes }}</td>
                                            <td>{{ $consultation->diagnostic }}</td>
                                            <td>{{ $consultation->heure_fin }}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item bg-success" href="{{ route('consultations.edit', $consultation->id) }}">
                                                            <i class="fa-solid fa-pen-to-square m-r-5"></i> Edit
                                                        </a>
                                                        <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette consultation ?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item bg-danger">
                                                                <i class="fa fa-trash-alt m-r-5"></i> Supprimer
                                                            </button>
                                                        </form>
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
</div>




@endsection
