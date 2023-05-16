@extends('layouts.app')

@section('page-title')
    Fumetto: {{ $comic->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 ">
                <div class="card">
                    <img src="{{ $comic->thumb }}" class="card-img-top" alt={{ $comic->title }}>
                    <div class="card-body">
                        <h5 class="card-title">{{ $comic->title }}</h5>
                        <p class="card-text">{{ $comic->description }}</p>
                        <p>Data di uscita: {{ $comic->sale_date }}</p>
                        <p>Genere: {{ $comic->series }}</p>
                        <p>Prezzo: {{ $comic->price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
