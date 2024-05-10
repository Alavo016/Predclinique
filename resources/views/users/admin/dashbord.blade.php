@extends('users.admin.masteradm')

@section('title', 'Admin Acceuil')

@section('content')
    <div class="page-wrapper">

        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            <h2>Bienvenu, <span>Admin</span></h2>
                            <p>Have a nice day at work</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="{{ asset('assets/assets/img/morning-img-01.png') }}" alt>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/assets/img/icons/calendar.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Appointments</h4>
                            <h2><span class="counter-up">250</span></h2>
                            <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>40%</span> vs
                                last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/assets/img/icons/profile-add.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>New Patients</h4>
                            <h2><span class="counter-up">140</span></h2>
                            <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>20%</span> vs
                                last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/assets/img/icons/scissor.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Operations</h4>
                            <h2><span class="counter-up">56</span></h2>
                            <p><span class="negative-view"><i class="feather-arrow-down-right me-1"></i>15%</span>
                                vs last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <div class="dash-boxs comman-flex-center">
                            <img src="{{ asset('assets/assets/img/icons/empty-wallet.svg') }}" alt>
                        </div>
                        <div class="dash-content dash-count">
                            <h4>Earnings</h4>
                            <h2>$<span class="counter-up"> 20,250</span></h2>
                            <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>30%</span> vs
                                last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Patient Visit by Gender</h4>
                                <div>
                                    <ul class="nav chat-user-total">
                                        <li><i class="fa fa-circle current-users" aria-hidden="true"></i>Male 75%
                                        </li>
                                        <li><i class="fa fa-circle old-users" aria-hidden="true"></i> Female 25%
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-block mb-0">
                                    <select class="form-control select">
                                        <option>2022</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div id="patient-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-3 d-flex">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Patient by Department</h4>
                            </div>
                            <div id="donut-chart-dash" class="chart-user-icon">
                                <img src="{{ asset('assets/assets/img/icons/user-icon.svg') }}" alt>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
