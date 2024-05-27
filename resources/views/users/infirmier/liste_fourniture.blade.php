@extends('users.infirmier.masterinf')

@section('title', 'Liste des fournitures médicales')
@section('content')

<style>
    .card-img-top-wrapper {
        height: 150px;
        overflow: hidden;
    }

    .card-img {
        width: 100%;
        height: 100%;
        
    }

    .card-title {
        font-weight: bold;
        font-size: 16px;
    }

    .card-text {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .card .btn {
        width: 100%;
    }

    .card {
        margin-bottom: 20px;
        border-radius: 10px;
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .alert {
        font-size: 12px;
        padding: 5px;
        text-align: center;
    }

    .btn-info, .btn-danger {
        width: 100%;
        padding: 5px 0;
    }
</style>

<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Liste des fournitures médicales</li>
                    </ul>
                </div>
            </div>
        </div>

        <x-session />

        <div class="row">
            @foreach ($fournitures as $fourniture)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-img-top-wrapper">
                            <img src="{{ asset('storage/' . $fourniture->photo) }}" class=" card-img"
                                 alt="{{ $fourniture->nom }}">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $fourniture->nom }}</h5>
                            <p class="card-text">
                                Quantité : {{ $fourniture->quantite }}<br>
                                Seuil minimum : {{ $fourniture->seuil_minimum }}<br>
                                Prix unitaire : {{ $fourniture->prix_unitaire }} FCA
                            </p>
                            <p class="card-text mt-auto">
                                <small class="text-muted">Type : {{ $fourniture->typeFourniture->nom }}</small>
                            </p>
                            <div class="mt-2">
                                @if ($fourniture->quantite < $fourniture->seuil_minimum)
                                    <div class="alert alert-danger p-1" role="alert">
                                        Stock faible
                                    </div>
                                @else
                                    <div class="alert alert-success p-1" role="alert">
                                        Stock suffisant
                                    </div>
                                @endif
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <a href="{{ route('fourniture.edit', $fourniture->id) }}"
                                       class="btn btn-info">Modifier</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('fourniture.destroy', $fourniture->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
