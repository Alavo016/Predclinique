@extends('users.patient.masterpat')

<link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap-datetimepicker.min.css') }}">
@section('title', 'Liste des Créances')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('patient.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Liste des Créances</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-lg-12">
                    <div class="card card-table show-entire">
                        <div class="card-body">
                            <div class="page-table-header mb-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="doctor-table-blk">
                                            <h3>Liste des Créances</h3>
                                            <div class="doctor-search-blk mt-2 mt-md-0">
                                                <div class="top-nav-search table-search-blk">
                                                    <input type="text" class="form-control" placeholder="Search here" id="customSearchInput">
                                                    <a class="btn" id="searchButton"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <!-- Add any additional buttons if needed -->
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 datatable custom-table comman-table mb-0 p-3">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Montant Total</th>
                                            <th>Date</th>
                                            <th>Montant Payé</th>
                                            <th>Montant Restant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($creances as $creance)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td>{{ $creance->id }}</td>
                                                <td>{{ $creance->montant_tot }}</td>
                                                <td>{{ $creance->date }}</td>
                                                <td>{{ $creance->montant_paye }}</td>
                                                <td style="background-color: #de5757;">{{ $creance->montant_res }}</td>
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
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="drop-scroll msg-list-scroll" id="msg_list">
                    <ul class="list-box">
                        <!-- Add message list items here -->
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">See all messages</a>
                </div>
            </div>
        </div>
    </div>
    <div id="delete_patient" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt width="50" height="46">
                    <h3>Are you sure want to delete this ?</h3>
                    <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
