@extends("users.infirmier.masterinf")

@section('title', "Modifier une fourniture médicale")
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Modifier une fourniture médicale</li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-session />
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('fourniture.update', $fourniture->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nom">Nom de la fourniture</label>
                                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $fourniture->nom) }}">
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantite">Quantité</label>
                                            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ old('quantite', $fourniture->quantite) }}">
                                            @error('quantite')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seuil_minimum">Seuil Minimum</label>
                                            <input type="number" class="form-control" id="seuil_minimum" name="seuil_minimum" value="{{ old('seuil_minimum', $fourniture->seuil_minimum) }}">
                                            @error('seuil_minimum')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prix_unitaire">Prix Unitaire</label>
                                            <input type="number" step="0.01" class="form-control" id="prix_unitaire" name="prix_unitaire" value="{{ old('prix_unitaire', $fourniture->prix_unitaire) }}">
                                            @error('prix_unitaire')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_fourniture_id">Type de Fourniture</label>
                                            <select class="form-control" id="type_fourniture_id" name="type_fourniture_id">
                                                @foreach ($types_fournitures as $type)
                                                    <option value="{{ $type->id }}" {{ $type->id == old('type_fourniture_id', $fourniture->type_fourniture_id) ? 'selected' : '' }}>{{ $type->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('type_fourniture_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control" id="photo" name="photo">
                                            @error('photo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            @if($fourniture->photo)
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/' . $fourniture->photo) }}" alt="{{ $fourniture->nom }}" style="max-height: 100px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        <a href="{{ route('fourniture.index') }}" class="btn btn-secondary">Annuler</a>
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
