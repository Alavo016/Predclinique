@extends("users.infirmier.masterinf")

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
            <a href="{{ route("Creance.create") }}" class="btn btn-primary  mb-2">Ajouter</a>
            <x-session />
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table show-entire">
                        <div class="card-body">

                            <div class="page-table-header mb-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="doctor-table-blk">
                                            <h3>Liste des patients</h3>
                                            <div class="doctor-search-blk">
                                                <div class="top-nav-search table-search-blk">
                                                    <form>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here">
                                                        <a class="btn"><img
                                                                src="{{ asset('assets/assets/img/icons/search-normal.svg') }}"
                                                                alt></a>
                                                    </form>
                                                </div>
                                                <div class="add-group">
                                                    <a href="{{ route('adm_Patient.create') }}"
                                                        class="btn btn-primary add-pluss ms-2"><img
                                                            src="{{ asset('assets/assets/img/icons/plus.svg') }}" alt></a>
                                                    <a href="javascript:;" class="btn btn-primary doctor-refresh ms-2"><img
                                                            src="{{ asset('assets/assets/img/icons/re-fresh.svg') }}"
                                                            alt></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-01.svg"
                                                alt></a>
                                        <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-02.svg"
                                                alt></a>
                                        <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-03.svg"
                                                alt></a>
                                        <a href="javascript:;"><img src="assets/img/icons/pdf-icon-04.svg" alt></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 custom-table comman-table datatable mb-0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>Non et Prénom</th>

                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Sexe</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td class="profile-image">
                                                    <a href="profile.html">
                                                        <img width="28" height="28"
                                                            src="{{ asset($patient->photo) }}"
                                                            class="rounded-circle m-r-5">
                                                        {{ $patient->prenom }} {{ $patient->name }}
                                                    </a>
                                                </td>

                                                <td>{{ $patient->pseudo }}</td>
                                                <td><a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a>
                                                </td>
                                                <td><a
                                                        href="tel:{{ $patient->telephone }}">{{ $patient->telephone }}</a>
                                                </td>
                                                <td>@if ($patient->sexe == "F" ||$patient->sexe == "Female")
                                                    Féminin
                                                @else
                                                    Masculin
                                                @endif</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item bg-success"
                                                                href="{{ route('adm_Patient.edit', $patient->id) }}">
                                                                <i class="fa-solid fa-pen-to-square m-r-5"></i> Edit
                                                            </a>
                                                            <form
                                                                action="{{ route('adm_Patient.destroy', $patient->id) }}"
                                                                method="POST">
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

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
