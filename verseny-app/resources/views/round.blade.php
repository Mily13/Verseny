@extends('app')

@section('title', 'Competition page')
@section('css', '../css/style.css')
@section('js', '../js/custom.js')

@section('content')
    <section id="header3" class="pb-5">
        <div class="container py-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card text-center">
                        <div class="card-header cardsecondary">
                            {{ $competition->name }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title cardtitle">{{ $round->name }}</h5>
                            <p class="card-text cardtext">{{ $round->date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <form id="competitor-form" method="POST" class="row justify-content-center">
                @csrf
                <div class="col-12 col-md-6 mb-3">
                    <select class="form-select" name="f_id" aria-label="Default select example">
                        <option selected>Válassz versenyzőt</option>
                        @foreach($users as $user)
                            <option value="{{ $user->f_id }}">{{ $user->name }} - {{ $user->email }} - {{ $user->age }} - {{ $user->gender }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="fordulo_id" value="{{ $round->fordulo_id }}">
                <div class="col-12 col-md-12">
                    <button type="submit" class="btn btn-lg btn-outline-light formbutton" id="submit-button" data-add-competitor-route="{{ route('add-competitor') }}">Versenyző hozzáadása<i class="bi bi-plus-circle-fill ms-2"></i></button>
                </div>
            </form>
        </div>
    </section>

    <h1 class="text-center title pt-5 pb-2">A forduló versenyzői</h1>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="table-responsive">
                    <table id="competitor-table" class="table table-striped table-hover table-bordered" border="1px">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Versenyző neve</th>
                            <th scope="col">Életkora</th>
                            <th scope="col">Neme</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefonszám</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($competitors as $competitor)
                            <tr id="tr_{{$competitor->f_id}}">
                                <td>{{ $competitor->f_id }}</td>
                                <td>{{ $competitor->name }}</td>
                                <td>{{ $competitor->age }}</td>
                                <td>{{ $competitor->gender }}</td>
                                <td>{{ $competitor->email }}</td>
                                <td>{{ $competitor->phone }}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger me-2 delete-competitor"
                                            data-f-id="{{ $competitor->f_id }}"
                                            data-fordulo-id="{{ $round->fordulo_id }}"
                                            data-delete-competitor-route="{{ route('delete-competitor') }}">
                                        Törlés</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
