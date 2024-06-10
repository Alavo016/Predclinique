@extends('users.doctor.masterdoc')
<link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap-datetimepicker.min.css
') }}">
@section('title', 'Liste des Patient ')

@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="schedule.html">Doctor Shedule </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Schedule List</li>
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
                                            <h3>Liste Patient</h3>
                                            <div class="doctor-search-blk mt-2 mt-md-0">
                                                <div class="top-nav-search table-search-blk">
                                                    <input type="text" class="form-control" placeholder="Search here"
                                                        id="customSearchInput">
                                                    <a class="btn" id="searchButton"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">

                                    </div>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table datatable border-0 custom-table comman-table mb-0"
                                    id="consultationsTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>Nom et Prénom</th>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
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
                                                            src="{{ asset($patient->photo) }}" class="rounded-circle m-r-5">
                                                        {{ $patient->prenom }} {{ $patient->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $patient->pseudo }}</td>
                                                <td><a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a></td>
                                                <td><a href="tel:{{ $patient->telephone }}">{{ $patient->telephone }}</a>
                                                </td>
                                                <td>
                                                    @if ($patient->sexe == 'F' || $patient->sexe == 'Female')
                                                        Féminin
                                                    @else
                                                        Masculin
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">

                                                            <a class="dropdown-item bg-success"
                                                                href="{{ route('doc.dossier', $patient->id) }}">
                                                                <i class="fa-solid fa-folder-open m-r-5"></i> Dossier
                                                                médical
                                                            </a>
                                                            <a class="dropdown-item bg-primary"
                                                                href="{{ route('consultations.create', ['patient_id' => $patient->id]) }}">
                                                                <i class="fa-solid fa-stethoscope m-r-5"></i> Nouvelle
                                                                consultation
                                                            </a>


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



    @endsection
