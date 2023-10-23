@extends('app')

@section('title', 'Competition page')
@section('css', '../css/style.css')
@section('js', '../js/custom.js')

@section('content')
    <section id="header2" class="pb-1">
        <div class="container pt-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card text-center">
                        <div class="card-header cardsecondary">
                            {{ $competition->country }} - {{ $competition->year }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title cardtitle">{{ $competition->name }}</h5>
                            <p class="card-text cardtext">{{ $competition->description }}</p>
                        </div>
                        <div class="card-footer cardsecondary">
                            {{ $competition->sport }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5 text-center">
            <button class="btn btn-outline-light btn-lg formbutton mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse"
                    aria-expanded="false" aria-controls="formCollapse">Új Forduló hozzáadása<i class="bi bi-caret-down-fill ms-1"></i>
            </button>

            <div class="collapse" id="formCollapse">
                <form id="round-form" method="POST" class="row g-3">
                    @csrf
                    <div class="form-group col-12 col-md-6">
                        <label class="formlabel" for="nameinput">Forduló neve:</label>
                        <input type="text" class="form-control" id="nameinput" name="name" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label class="formlabel" for="dateinput">Dátum:</label>
                        <input type="date" class="form-control" id="dateinput" name="date" required>
                    </div>
                    <input type="hidden" name="v_id" value="{{ $competition->v_id }}">
                    <div class="col-12 col-md-12">
                        <button type="submit" class="btn btn-lg btn-outline-light formbutton" id="submit-button" data-add-round-route="{{ route('add-round') }}">Forduló hozzáadása<i class="bi bi-plus-circle-fill ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <h1 class="text-center title pt-5 pb-2">A verseny fordulói</h1>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="table-responsive">
                    <table id="round-table" class="table table-striped table-hover table-bordered" border="1px">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Forduló neve</th>
                            <th scope="col">Pontos dátum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rounds as $round)
                            <tr>
                                <td>{{ $round->fordulo_id }}</td>
                                <td>
                                    <a href="{{ route('round', ['fordulo_id' => $round->fordulo_id]) }}"><b>{{ $round->name }}</b></a>
                                </td>
                                <td>{{ $round->date }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
