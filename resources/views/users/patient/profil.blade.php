@extends('users.patient.masterpat')
@section('title', 'Dashboard Patient')
@section('content')


    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="patients.html">Patients </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Patient Profile</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="about-info">
                                        <h4>Patients Profile <span><a href="javascript:;"><i
                                                        class="feather-more-vertical"></i></a></span></h4>
                                    </div>
                                    <div class="doctor-profile-head">
                                        <div class="profile-bg-img">
                                            <img src="{{ asset('assets/assets/img/profile-bg.jpg') }}" alt="Profile">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9 col-xl-4 col-md-4">
                                                <div class="profile-user-box">
                                                    <div class="profile-user-img">
                                                        <img src=" {{ URL::asset($user->photo) }}" alt="Profile">
                                                        <div class="input-block doctor-up-files profile-edit-icon mb-0">

                                                        </div>
                                                    </div>
                                                    <div class="names-profiles">
                                                        <h4>{{ $user->name }} </h4>

                                                        <h5>Patient</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                                <div class="follow-group">
                                                    <div class="doctor-follows">
                                                        <h4>Pseudo</h4>
                                                        <h5>{{ $user->pseudo }}</h5>
                                                    </div>
                                                    <div class="doctor-follows ms-3">
                                                        <h4>Civilite</h4>
                                                        <h5>{{ $user->etat_civile }}</h5>
                                                    </div>
                                                    <div class="doctor-follows ms-3">
                                                        <h4>Adresse</h4>
                                                        <h5>{{ $user->address }} jsbvkhs</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-xl-4 d-flex align-items-center">
                                                <div class="follow-btn-group py-3">

                                                    <a href="{{ route('mdpass', ['id' => $user->id]) }}"
                                                        class="btn btn-outline-danger ">Modifier password</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="doctor-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="heading-detail ">
                                            <h3 class="mb-3" style="color: blue">A Propos</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus,
                                                quo!p>
                                        </div>
                                        <div class="about-me-list">
                                            <ul class="list-space">
                                                <li>
                                                    <h4>Sexe</h4>
                                                    <span>
                                                        @if ($user->sexe == 'M')
                                                            <a href="">Masculin</a>
                                                        @else
                                                            <a href="">Feminin</a>
                                                        @endif
                                                    </span>
                                                </li>
                                                <li>
                                                    <h4>Ville</h4>
                                                    <span>{{ $user->ville }}</span>
                                                </li>
                                                <li>
                                                    <h4>Date de naissance</h4>
                                                    <span>{{ $user->date_naissance }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="  " style="color: blue">Allergies</h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @foreach (explode(',', $user->allergie) as $allergie)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <p class="name text-dark fs-6">
                                                                    <strong>{{ $allergie }}</strong>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="doctor-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content-set">
                                            <ul class="nav">
                                                <li>
                                                    <a href="patient-profile.html" class="active"><span
                                                            class="set-about-icon me-2"><img
                                                                src="{{ asset('assets/assets/img/icons/menu-icon-02.svg') }}"
                                                                alt></span>Informations
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="personal-list-out">
                                            <div class="row">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2> {{ $user->name }}</h2>
                                                        <h3>{{ $user->prenom }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2>Telephone </h2>
                                                        <h3>{{ $user->telephone }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2>Email</h2>
                                                        <h3><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                                                class="__cf_email__"
                                                                data-cfemail="9be8f6f2eff3dbfef6faf2f7b5f8f4f6">{{ $user->email }}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2>Nationnalité</h2>
                                                        <h3>{{ $user->nationalite }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hello-park">

                                        </div>
                                    </div>
                                </div>
                                @php
                                    use Carbon\Carbon;
                                @endphp

                                <div class="card ">
                                    <div class="card-header">
                                        <h4 class="card-title">Medical History</h4>
                                    </div>
                                    <div class="card-body p-0 table-dash">
                                        <div class="table-responsive">
                                            <table class="table mb-0 border-0 datatable custom-table patient-profile-table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="form-check check-tables">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="something">
                                                            </div>
                                                        </th>
                                                        <th>Date</th>
                                                        <th>Doctor</th>
                                                        <th>Treatment</th>
                                                        <th>Charges ($)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($historiqueRendezVous as $rendezVous)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check check-tables">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="something">
                                                                </div>
                                                            </td>
                                                            <td>{{ Carbon::parse($rendezVous->date)->format('d/m/Y') }}
                                                            </td>
                                                            <td>{{ $rendezVous->doctor->name }}</td>
                                                            <td>{{ $rendezVous->motif }}</td>
                                                            <td>{{ $rendezVous->prix }}</td>
                                                            <td class="text-end">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fa fa-ellipsis-v"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            {{ $historiqueRendezVous->links('pagination::bootstrap-5') }}
                                        </div>
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
