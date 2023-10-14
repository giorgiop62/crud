@extends('layout.main')

@section('content')
    <div class="container">

        <h1 class="my-5"> {{ $beer->name }} </h1>
        <p>$ {{ number_format($beer->price, 2, ',', '.') }}</p>
        <p>Rating: {{ number_format($beer->rating, 1, ',', '.') }}</p>
        <img src="{{ $beer->image }}" alt="{{ $beer->name }}">

        <div>
            <a class="btn btn-info" href="{{ route('beers.index') }}">Torna all'elenco</a>

        </div>
    </div>
@endsection
