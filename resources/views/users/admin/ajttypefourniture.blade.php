@extends('users.admin.masteradm')

@section('title', 'Admin Ajout Type Fourniture')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Ajout d'un type de fourniture</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('typefournitures.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Ajout Type de fourniture</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Nom du type de fourniture <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="nom" value="{{ old('nom') }}" required>
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="doctor-submit text-end">
                                            <button type="submit" class="btn btn-outline-success submit-form me-2">Enregistrer</button>
                                            <a href="{{ route('typefournitures.index') }}" class="btn btn-outline-danger cancel-form">Annuler</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
