@extends('users.infirmier.masterinf')

@section('title', "Ajout d'une créance")
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.listdocteur') }}">Doctors </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Ajout d'un docteur </li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-session/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('Creance.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-heading">
                                                <h4>Ajout Créance</h4>
                                            </div>
                                        </div>
                                        <div class=" col-md-6 col-xl-12">
                                            <div class="input-block local-forms">
                                                <label for="patient_id">Patient</label>
                                                <input type="text" class="form-control" id="search_patient"
                                                    list="patients" placeholder="Rechercher un patient">
                                                <datalist id="patients">
                                                    @foreach ($patients as $patient)
                                                        <option value="{{ $patient->name }} {{ $patient->prenom }}">
                                                    @endforeach
                                                </datalist>
                                                <select class="form-control d-none" name="patient_id" id="patient_id">
                                                    @foreach ($patients as $patient)
                                                        <option value="{{ $patient->id }}">{{ $patient->name }}
                                                            {{ $patient->prenom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('patient_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class=" col-md-6 col-xl-12">
                                            <div class="input-block local-forms">
                                                <label>Montant Total <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="montant_tot">
                                                @error('montant_tot')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block local-forms">
                                                <label>Montant Restant <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="montant_res">
                                                @error('montant_res')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block local-forms">
                                                <label>Montant Payé <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="montant_paye">
                                                @error('montant_paye')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="doctor-submit text-end">
                                                <button type="submit"
                                                    class="btn btn-outline-success submit-form me-2">Enregistrer</button>
                                                <button type="reset"
                                                    class="btn btn-outline-danger cancel-form">Annuler</button>
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


    <script>
        document.getElementById('search_patient').addEventListener('input', function() {
            var input = this.value.toLowerCase();
            var options = document.getElementById('patients').childNodes;
            for (var i = 0; i < options.length; i++) {
                if (options[i].nodeName === 'OPTION') {
                    if (options[i].value.toLowerCase().indexOf(input) !== -1) {
                        options[i].setAttribute('style', 'display: block;');
                    } else {
                        options[i].setAttribute('style', 'display: none;');
                    }
                }
            }
        });
    </script>


@endsection
