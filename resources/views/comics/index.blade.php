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
          <td>{{ $comic->title }}</td>
          <td>{{ $comic->description }}</td>
          <td>
            <img src="{{ $comic->thumb }}" alt="">
          </td>
          <td>{{ $comic->price }}</td>
          <td>{{ $comic->series }}</td>
          <td>{{ $comic->sale_date }}</td>
          <td>{{ $comic->type }}</td>

          <!-- 1 - CRUD / Read / Show -->
          <!-- Creo collegamento alla Rotta Dinamica 'Show', passando il Parametro -->
          <td><a href=" {{ route('comics.show', $comic) }} ">Dettaglio</a></td>

          <!-- 3 - CRUD / Update / Edit -->
          <!-- Pulsante che porta alla Pagina di Edit, passando il Parametro -->
          <td><a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning">Modifica</a></td>

          <!-- 4 - CRUD / Destroy -->
          <!-- Ho bisogno di un Form perchè devo "traformare" il metodo con la direttiva "method" -->
          <td>
            <form action=" {{ route('comics.destroy', $comic )}} " method="post">
              @csrf <!-- Direttiva che genera un Input Nascosto con un Codice associato che riconosce il Form del Sito -->
              @method('delete') <!-- Direttiva che permette di "trasformare" il metodo 'POST' del Form in un DELETE -->

              <!-- Pulsante che porta alla Pagina di Destroy -->
              <input type="submit" class="btn btn-danger" value="Elimina">
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

  </div>
</main>
@endsection