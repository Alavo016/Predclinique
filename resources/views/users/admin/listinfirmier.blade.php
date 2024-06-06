@extends('users.admin.masteradm')

@section('title', 'Admin Liste des infirmiers')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Liste des infirmiers</li>
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
                                            <h3>Liste des infirmiers</h3>
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
                                                    <a href="{{ route('adm_infirmier.create') }}"
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
                                            <th>Departement</th>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Détails</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($infirmiers as $infirmier)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td class="profile-image">
                                                    <a href="profile.html">
                                                        <img width="28" height="28"
                                                            src="{{ asset($infirmier->photo) }}"
                                                            class="rounded-circle m-r-5">
                                                        {{ $infirmier->prenom }} {{ $infirmier->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $infirmier->specialite['nom'] }}</td>
                                                <td>{{ $infirmier->pseudo }}</td>
                                                <td><a href="mailto:{{ $infirmier->email }}">{{ $infirmier->email }}</a>
                                                </td>
                                                <td><a
                                                        href="tel:{{ $infirmier->telephone }}">{{ $infirmier->telephone }}</a>
                                                </td>
                                                <td><a href="{{ route('admin.profile', ['id' => $infirmier->id]) }}"
                                                        class="btn btn-primary">
                                                        Détails
                                                    </a></td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('adm_infirmier.edit', $infirmier->id) }}">
                                                                <i class="fa-solid fa-pen-to-square m-r-5"></i> Edit
                                                            </a>
                                                            @if ($infirmier->status == 1)
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.toggle.docteur', ['id' => $infirmier->id]) }}"
                                                                    onclick="event.preventDefault(); document.getElementById('toggle-form-{{ $infirmier->id }}').submit();">
                                                                    <i class="fa fa-ban m-r-5"></i> Bloquer
                                                                </a>
                                                            @else
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.toggle.docteur', ['id' => $infirmier->id]) }}"
                                                                    onclick="event.preventDefault(); document.getElementById('toggle-form-{{ $infirmier->id }}').submit();">
                                                                    <i class="fa fa-check m-r-5"></i> Activer
                                                                </a>
                                                            @endif

                                                            <form id="toggle-form-{{ $infirmier->id }}"
                                                                action="{{ route('admin.toggle.docteur', ['id' => $infirmier->id]) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('PUT')
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
