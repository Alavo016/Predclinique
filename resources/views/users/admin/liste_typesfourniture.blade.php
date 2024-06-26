@extends('users.admin.masteradm')

@section('title', 'Admin Liste des types de fournitures')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Liste des types de fournitures</li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-session />

            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <div class="card card-table show-entire">
                        <div class="card-body">
                            <div class="page-table-header mb-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="doctor-table-blk">
                                            <h3>Liste des types de fournitures</h3>
                                            <div class="doctor-search-blk">
                                                <div class="top-nav-search table-search-blk">
                                                    <form>
                                                        <input type="text" class="form-control" placeholder="Search here"
                                                            id="customSearchInput">
                                                        <a class="btn"><img
                                                                src="{{ asset('assets/assets/img/icons/search-normal.svg') }}"
                                                                alt></a>
                                                    </form>
                                                </div>
                                                <div class="add-group">
                                                    <a href="{{ route('typefournitures.create') }}"
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
                                        <!-- Liens pour télécharger des PDF -->
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
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($typesFournitures as $typeFourniture)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td>{{ $typeFourniture->id }}</td>
                                                <td>{{ $typeFourniture->nom }}</td>
                                                <td class="text-end">
                                                    <a class="btn btn-outline-success"
                                                        href="{{ route('typefournitures.edit', $typeFourniture->id) }}">
                                                        <i class="fa-solid fa-pen-to-square m-r-5"></i> Modifier
                                                    </a>
                                                    <form
                                                        action="{{ route('typefournitures.destroy', $typeFourniture->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce type de fourniture?')">
                                                            <i class="fa fa-trash-alt m-r-5"></i> Supprimer
                                                        </button>
                                                    </form>
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
