@extends('layouts.app')

@section('page-title', 'Lista dei fumetti')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-4 py-3">
                    <div class="card p-3" style="width: 18rem;">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <a href="{{route('comics.show', ['comic' => $comic->id])}}" class="btn btn-primary">Dettagli fumetto</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
