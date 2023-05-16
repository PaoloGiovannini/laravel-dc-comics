@extends('layouts.app')

@section('page-title')
    Inserisci un nuovo fumetto
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{ route('comics.store') }}">

                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label">Url dell'immagine:</label>
                    <input type="text" class="form-control" id="thumb" name="thumb">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo:</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                    <label for="series" class="form-label">Serie:</label>
                    <input type="text" class="form-control" id="series" name="series">
                </div>

                <div class="mb-3">
                    <label for="sale_date" class="form-label">Data di uscita:</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo:</label>
                    <input type="text" class="form-control" id="type" name="type">
                </div>


                <button type="submit" class="btn btn-primary">Salva</button>
            </form>

        </div>
    </div>
@endsection
