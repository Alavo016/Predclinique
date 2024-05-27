@extends("users.infirmier.masterinf")

@section('title', "Ajout d'une fourniture médicale")
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Ajout d'une fourniture médicale</li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-session />
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('fourniture.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Ajout Fourniture Médicale</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Nom de la fourniture <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="nom">
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Quantité <span class="login-danger">*</span></label>
                                            <input class="form-control" type="number" name="quantite">
                                            @error('quantite')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Seuil Minimum <span class="login-danger">*</span></label>
                                            <input class="form-control" type="number" name="seuil_minimum">
                                            @error('seuil_minimum')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Prix Unitaire <span class="login-danger">*</span></label>
                                            <input class="form-control" type="number" step="0.01" name="prix_unitaire">
                                            @error('prix_unitaire')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Type de Fourniture <span class="login-danger">*</span></label>
                                            <select class="form-control" name="type_fourniture_id">
                                                @foreach ($types_fournitures as $type)
                                                    <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('type_fourniture_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Photo <span class="login-danger">*</span></label>
                                            <input class="form-control" type="file" name="photo">
                                            @error('photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary me-2">Enregistrer</button>
                                    <a href="{{ route('fourniture.index') }}" class="btn btn-secondary">Annuler</a>
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
