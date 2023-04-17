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
          <th>Show</th>
        </tr>
      </thead>

      <tbody>

        @foreach ($comics as $comic)
        <tr>
          <td>{{ $comic['title'] }}</td>
          <td>{{ $comic['description'] }}</td>
          <td>
            <img src="{{ $comic['thumb'] }}" alt="">
          </td>
          <td>{{ $comic['price'] }}</td>
          <td>{{ $comic['series'] }}</td>
          <td>{{ $comic['sale_date'] }}</td>
          <td>{{ $comic['type'] }}</td>

          <!-- 1 - CRUD / Read / Show -->
          <!-- Creo collegamento alla Rotta Dinamica 'Show', passando il Parametro -->
          <td><a href=" {{ route('comics.show', $comic) }} ">Dettaglio</a></td>

          <!-- 3 - CRUD / Update / Edit -->
          <!-- Pulsante che porta alla Pagina di Edit, passando il Parametro -->
          <td><a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning">Modifica</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>

  </div>
</main>
@endsection