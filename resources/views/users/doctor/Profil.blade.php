@extends("users.doctor.masterdoc")

@section('title', "Profil doctor")
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}">Dashboard </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Mon Profil</li>
                    </ul>
                </div>
                <div class="col-sm-5 col-6 text-end m-b-30">
                    <a href="{{ route('doctor.edit_doctor') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Modifier Profil</a>
                </div>
            </div>
            <div class="card-box profile-header ">
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
                                            <small class="text-muted">{{ $specialites->nom }}</small>
                                            <div class="staff-id">Employee ID : DR-0001</div>
                                            <div class="staff-msg"><a
                                                    href="{{ route('mdpass.doc', ['id' => $user->id]) }}"
                                                    class="btn btn-primary">
                                                    Modifier Password</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text"><a href>{{ $user->telephone }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href><span class="__cf_email__"
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
                                            <li><span class="title"> Nationnalité</span>
                                            <span class="text"> {{ $user->nationalite }} </span>
                                            </li>

                                            <li><span class="title"> Etat Matrimoniale</span>
                                                <span class="text"> {{ $user->etat_civile }} </span>
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
