@extends('layout.main')

@section('content')
    <div class="container">
        <h1>le mie birre</h1>
        <a class="btn btn-primary" href="{{ route('beers.create') }}">ADD</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <a href="{{ route('beers.orderby', ['id', $direction]) }}">ID</a>
                    </th>
                    <th scope="col">
                        <a href="{{ route('beers.orderby', ['name', $direction]) }}">NOME</a>

                    </th>
                    <th scope="col">
                        <a href="{{ route('beers.orderby', ['price', $direction]) }}">PREZZO</a>
                    </th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($beers as $beer)
                    <tr>
                        <td>{{ $beer->id }}</td>
                        <td>{{ $beer->name }}</td>
                        <td>$ {{ number_format($beer->price, 2, ',', '.') }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary" href="{{ route('beers.show', $beer) }}">SHOW</a>
                            <a class="btn btn-info" href="{{ route('beers.edit', $beer) }}">Edit</a>
                            @include('partials.form-delete')

                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="container">
            {{ $beers->links() }}
        </div>


    </div>
@endsection
