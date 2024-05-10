@extends('users.admin.masteradm')

@section('title', 'Admin Profil Docteur')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="doctors.html">Doctors </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active"> Profil </li>
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
                                        <h4>{{ $user->name }}{{ $user->prenom }} <span><a href="javascript:;"><i
                                                        class="feather-more-vertical"></i></a></span></h4>
                                    </div>
                                    <div class="doctor-profile-head">
                                        <div class="profile-bg-img">
                                            <img src="{{ asset('assets/assets/img/profile-bg.jpg') }}" alt="Profile">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="profile-user-box">
                                                    <div class="profile-user-img">
                                                        <img src="{{ URL::asset($user->photo) }}" alt="Profile">
                                                        <div class="input-block doctor-up-files profile-edit-icon mb-0">
                                                            <div class="uplod d-flex">
                                                                <label class="file-upload profile-upbtn mb-0">
                                                                    <img src="assets/img/icons/camera-icon.svg"
                                                                        alt="Profile"></i><input type="file">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="names-profiles">
                                                        <h4>Dr. {{ $user->name }} {{ $user->prenom }}</h4>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                                <div class="follow-group">
                                                    <div class="doctor-follows">
                                                        <h5>Followers</h5>
                                                        <h4>850</h4>
                                                    </div>
                                                    <div class="doctor-follows">
                                                        <h5>Following</h5>
                                                        <h4>18K</h4>
                                                    </div>
                                                    <div class="doctor-follows">
                                                        <h5>Posts</h5>
                                                        <h4>250</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($user->status == "active")
                                                <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                                    <div class="follow-btn-group">
                                                        <a href="#" class="btn btn-danger follower-btn">Bloquer </a>
                                                        <button type="submit"
                                                            class="btn btn-info message-btns">Message</button>
                                                    </div>
                                                </div>

                                            @else
                                            <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                                    <div class="follow-btn-group">
                                                        <a href="#" class="btn btn-danger follower-btn">Activer </a>

                                                    </div>
                                                </div>
                                            @endif

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
                                            <h3 class="mb-3">A Propos</h3>

                                        </div>
                                        <div class="about-me-list mt-3">
                                            <ul class="list-space">

                                                <li>
                                                    <h4>Departement :</h4>
                                                    <span>{{ $user->specialite['nom'] }}</span>
                                                </li>
                                                <li>
                                                    <h4>Sexe</h4>
                                                    <span>{{ $user->sexe }}</span>
                                                </li>

                                                <li>
                                                    <h4>Designation</h4>
                                                    <span>Sr. Doctor</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>Skills:</h4>
                                        </div>
                                        <div class="skill-blk">
                                            <div class="skill-statistics">
                                                <div class="skills-head">
                                                    <h5>Operations</h5>
                                                    <p>45%</p>
                                                </div>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-operations" role="progressbar"
                                                        style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="skill-statistics">
                                                <div class="skills-head">
                                                    <h5>Patient Care</h5>
                                                    <p>85%</p>
                                                </div>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-statistics" role="progressbar"
                                                        style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="skill-statistics">
                                                <div class="skills-head">
                                                    <h5>Endoscopic </h5>
                                                    <p>65%</p>
                                                </div>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-endoscopic" role="progressbar"
                                                        style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="skill-statistics">
                                                <div class="skills-head">
                                                    <h5>Patient Visit </h5>
                                                    <p>90%</p>
                                                </div>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-visit" role="progressbar" style="width: 90%"
                                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>Speciality</h4>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons status-grey">
                                                <img src="assets/img/icons/medal-01.svg" alt>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Proffesionals</h4>
                                                <h5>Certified Skin Treatment</h5>
                                            </div>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons status-green">
                                                <img src="assets/img/icons/medal-02.svg" alt>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Certified</h4>
                                                <h5>Cold Laser Operation</h5>
                                            </div>
                                        </div>
                                        <div class="personal-activity mb-0">
                                            <div class="personal-icons status-orange">
                                                <img src="assets/img/icons/medal-03.svg" alt>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Medication Laser</h4>
                                                <h5>Hair Lose Product</h5>
                                            </div>
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
                                                    <a href="doctor-profile.html" class="active"><span
                                                            class="set-about-icon me-2"><img
                                                                src="assets/img/icons/menu-icon-02.svg" alt></span>About
                                                        me</a>
                                                </li>
                                                <li>
                                                    <a href="doctor-setting.html"><span class="set-about-icon me-2"><img
                                                                src="assets/img/icons/menu-icon-16.svg"
                                                                alt></span>Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="personal-list-out">
                                            <div class="row">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2>Full Name</h2>
                                                        <h3>Dr.Bruce Willis</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2>Mobile </h2>
                                                        <h3>264-625-2583</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2>Email</h2>
                                                        <h3><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                                                class="__cf_email__"
                                                                data-cfemail="bfddcdcadcdaffdad2ded6d391dcd0d2">[email&#160;protected]</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="detail-personal">
                                                        <h2>Location</h2>
                                                        <h3>Los Angeles</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hello-park">
                                            <p>Completed my graduation in Gynaecologist Medicine from the well known
                                                and renowned institution of India – SARDAR PATEL MEDICAL COLLEGE,
                                                BARODA in 2000-01, which was affiliated to M.S. University. I ranker
                                                in University exams from the same university from 1996-01.</p>
                                            <p>Worked as Professor and Head of the department ; Community medicine
                                                Department at Sterline Hospital, Rajkot, Gujarat from 2003-2015</p>
                                        </div>
                                        <div class="hello-park mb-2">
                                            <h5>Education</h5>
                                            <div class="table-responsive">
                                                <table class="table mb-0 border-0 custom-table profile-table">
                                                    <thead>
                                                        <th>Year</th>
                                                        <th>Degree</th>
                                                        <th>Institute</th>
                                                        <th>Result</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>2002-2005</td>
                                                            <td>M.D. of Medicine</td>
                                                            <td>University of Wyoming </td>
                                                            <td>
                                                                <button
                                                                    class="custom-badge status-green ">Distinction</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2005-2014</td>
                                                            <td>MBBS</td>
                                                            <td>Netherland Medical College </td>
                                                            <td>
                                                                <button
                                                                    class="custom-badge status-green ">Distinction</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="hello-park mb-2">
                                            <h5>Experience</h5>
                                            <div class="table-responsive">
                                                <table class="table mb-0 border-0 custom-table profile-table">
                                                    <thead>
                                                        <th>Year</th>
                                                        <th>Position</th>
                                                        <th>Hospital</th>
                                                        <th>Feedback</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>2002-2005</td>
                                                            <td>Senior doctor </td>
                                                            <td>Midtown Medical Clinic </td>
                                                            <td>
                                                                <button class="custom-badge status-orange ">Good</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2005-2014</td>
                                                            <td>Associate Prof. </td>
                                                            <td>Netherland Medical College </td>
                                                            <td>
                                                                <button
                                                                    class="custom-badge status-green ">Excellence</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="hello-park">
                                            <h5>Conferences, Cources & Workshop Attended</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                officia deserunt mollit anim id est laborum.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                accusantium doloremque laudantium, totam rem aperiam</p>
                                            <p class="mb-0">Ut enim ad minima veniam, quis nostrum exercitationem
                                                ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
                                                consequatur? Quis autem vel eum iure reprehenderit qui in ea
                                                voluptate velit esse quam nihil molestiae consequatur</p>
                                        </div>
                                    </div>
                                </div>
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
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item new-message">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">John Doe</span>
                                        <span class="message-time">1 Aug</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">D</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Domenic Houston </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">B</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Buster Wigton </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Rolland Webber </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Claire Mapes </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Melita Faucher</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Jeffery Lalor</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">L</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Loren Gatlin</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Tarah Shropshire</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">See all messages</a>
                </div>
            </div>
        </div>
    </div>

@endsection
