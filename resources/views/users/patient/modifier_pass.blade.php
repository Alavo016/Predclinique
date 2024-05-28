@extends('users.patient.masterpat')

@section('title', 'Dashboard Patient')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-session />

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('patient.updatePassword') }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <h4 class="page-title">Change Password</h4>
                                    <div class="col-12 col-md-6 col-xl-12">
                                        <div class="input-block local-forms">
                                            <label for="old_password">Old password <span class="login-danger">*</span></label>
                                            <input id="old_password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                type="password" name="old_password" required
                                                autocomplete="current-password">
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label for="password">New password <span class="login-danger">*</span></label>
                                            <input id="password"
                                                class="form-control @error('password') is-invalid @enderror" type="password"
                                                name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label for="password_confirmation">Confirm password <span
                                                    class="login-danger">*</span></label>
                                            <input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="doctor-submit text-end">
                                            <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
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
    