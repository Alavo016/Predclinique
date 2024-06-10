@extends('users.admin.masteradm')

@section('title', 'Admin Profil Utilisateur')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active"> Profil </li>
                        </ul>
                    </div>
                </div>
            </div>
<x-session />
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ URL::asset($user->photo) }}" alt></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $user->name }} {{ $user->prenom }}</h3>

                                            <div class="staff-id">Employee ID : DR-0001</div>

                                            <div class="staff-msg text-center">
                                                @if ($user->status == 1)
                                                    <a class="btn btn-danger"
                                                        href="{{ route('admin.toggle.docteur', ['id' => $user->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('toggle-form-{{ $user->id }}').submit();">
                                                        <i class="fa fa-ban m-r-5"></i> Bloquer
                                                    </a>
                                                @else
                                                    <a class="btn btn-success"
                                                        href="{{ route('admin.toggle.docteur', ['id' => $user->id]) }}"
                                                        onclick="event.preventDefault(); document.getElementById('toggle-form-{{ $user->id }}').submit();">
                                                        <i class="fa fa-check m-r-5"></i> Activer
                                                    </a>
                                                @endif

                                                <form id="toggle-form-{{ $user->id }}"
                                                    action="{{ route('admin.toggle.docteur', ['id' => $user->id]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                            </div>
                                            <!-- Ajout du bouton "Supprimer le profil" -->
                                            <div class="text-center mt-3">
                                                <form action="{{ route('admin.delete.user', ['id' => $user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce profil?');">
                                                        <i class="fa fa-trash"></i> Supprimer le profil
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text"><a href="#">{{ $user->telephone }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#"><span class="__cf_email__"
                                                            data-cfemail="e685948f95928f8887819489908395a6839e878b968a83c885898b">{{ $user->email }}</span></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Birthday:</span>
                                                <span
                                                    class="text">{{ \Carbon\Carbon::parse($user->date_naissance)->format('jS F') }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $user->ville }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text">{{ $user->sexe }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
