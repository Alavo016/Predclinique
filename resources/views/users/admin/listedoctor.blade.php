@extends('users.admin.masteradm')

@section('title', 'Admin Ajout docteur')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.listdocteur') }}">Doctors </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Liste des docteurs</li>
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
                                            <h3>Doctors List</h3>
                                            <div class="top-nav-search table-search-blk">
                                                    <form>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here" id="customSearchInput">
                                                        <a class="btn"><img
                                                                src="{{ asset('assets/assets/img/icons/search-normal.svg') }}"
                                                                alt></a>
                                                    </form>
                                                </div>
                                            <div class="add-group">
                                                <a href="{{ route('ajtdoc') }}" class="btn btn-primary add-pluss ms-2"><img
                                                        src="{{ asset('assets/assets/img/icons/plus.svg') }}" alt></a>
                                                <a href="javascript:;" class="btn btn-primary doctor-refresh ms-2"><img
                                                        src="{{ asset('assets/assets/img/icons/re-fresh.svg') }}" alt></a>
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
                                    @foreach ($listdocteurs as $docteur)
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td class="profile-image">
                                                <a href="profile.html">
                                                    <img width="28" height="28" src="{{ asset($docteur->photo) }}"
                                                        class="rounded-circle m-r-5">
                                                    {{ $docteur->prenom }} {{ $docteur->name }}
                                                </a>
                                            </td>
                                            <td>{{ $docteur->specialite['nom'] }}</td>
                                            <td>{{ $docteur->pseudo }}</td>
                                            <td><a href="mailto:{{ $docteur->email }}">{{ $docteur->email }}</a></td>
                                            <td><a href="tel:{{ $docteur->telephone }}">{{ $docteur->telephone }}</a>
                                            </td>
                                            <td><a href="{{ route('admin.profile', ['id' => $docteur->id]) }}"
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
                                                            href="{{ route('admin.modifier', ['id' => $docteur->id]) }}"><i
                                                                class="fa-solid fa-pen-to-square m-r-5"></i>
                                                            Edit</a>
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
    <div class="notification-box">
        <div class="msg-sidebar notifications msg-noti">
            <div class="topnav-dropdown-header">
                <span>Messages</span>
            </div>
            <div class="drop-scroll msg-list-scroll" id="msg_list">
                <ul class="list-box">
                    <!-- Liste des messages ici -->
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="chat.html">See all messages</a>
            </div>
        </div>
    </div>
    </div>
@endsection
