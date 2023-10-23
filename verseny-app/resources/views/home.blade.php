@extends('app')

@section('title', 'Home page')
@section('css', 'css/style.css')
@section('js', 'js/custom.js')

@section('content')
    <section id="header" class="pb-5">
        <div class="container mt-5">
            <h1 class="text-center py-5 headertitle">Új verseny hozzáadása</h1>
            <form id="competition-form" method="POST" class="row justify-content-center">
                @csrf
                <div class="form-group col-6 col-md-4">
                    <label class="formlabel" for="nameinput">Név:</label>
                    <input type="text" class="form-control" id="nameinput" name="name" required>
                </div>
                <div class="form-group col-6 col-md-2">
                    <label class="formlabel" for="yearinput">Év:</label>
                    <input type="number" class="form-control" id="yearinput" name="year" required>
                </div>
                <div class="form-group col-6 col-md-3">
                    <label class="formlabel" for="countryinput">Ország:</label>
                    <input type="text" class="form-control" id="countryinput" name="country" required>
                </div>
                <div class="form-group col-6 col-md-3">
                    <label class="formlabel" for="sportinput">Sportág:</label>
                    <input type="text" class="form-control" id="sportinput" name="sport" required>
                </div>
                <div class="form-group col-12 col-md-12">
                    <label class="formlabel" for="descriptioninput">Leírás:</label>
                    <textarea class="form-control" id="descriptioninput" name="description" rows="3"></textarea>
                </div>
                <div class="col-12 col-md-12 pt-2">
                    <button type="submit" class="btn btn-lg btn-outline-light formbutton" id="submit-button" data-add-competition-route="{{ route('add-competition') }}"><i class="bi bi-plus-circle me-1"></i> ADD</button>
                </div>
            </form>
        </div>
    </section>

    <h1 class="text-center title my-4">Regisztrált versenyek</h1>
    <div class="mx-5 my-2">
        <div class="table-responsive">
            <table id="competition-table" class="table table-striped table-hover table-bordered" border="1px">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Név</th>
                    <th scope="col">Év</th>
                    <th scope="col">Leírás</th>
                    <th scope="col">Ország</th>
                    <th scope="col">Sportág</th>
                </tr>
                </thead>
                <tbody>
                @foreach($competitions as $competition)
                    <tr>
                        <td>{{ $competition->v_id }}</td>
                        <td>
                            <a href="{{ route('competition', ['v_id' => $competition->v_id]) }}"><b>{{ $competition->name }}</b></a>
                        </td>
                        <td>{{ $competition->year }}</td>
                        <td>{{ $competition->description }}</td>
                        <td>{{ $competition->country }}</td>
                        <td>{{ $competition->sport }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

