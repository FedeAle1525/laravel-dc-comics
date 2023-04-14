<!-- Estendo App con Layout -->
@extends('layouts.app')

@section('content')

<main>
  <div class="container">

    <!-- 1 - CRUD / Read / Index -->
    <table class="table">
      <thead>
        <tr>
          <th>Titolo</th>
          <th>Descrizione</th>
          <th>Immagine</th>
          <th>Prezzo</th>
          <th>Serie</th>
          <th>Data D'Uscita</th>
          <th>Tipo</th>
        </tr>
      </thead>

      <tbody>

        @foreach ($comics as $comic)
        <tr>
          <td>{{ $comic['title'] }}</td>
          <td>{{ $comic['description'] }}</td>
          <td>{{ $comic['thumb'] }}</td>
          <td>{{ $comic['price'] }}</td>
          <td>{{ $comic['series'] }}</td>
          <td>{{ $comic['sale_date'] }}</td>
          <td>{{ $comic['type'] }}</td>
        </tr>
        @endforeach

      </tbody>
    </table>

  </div>
</main>
@endsection