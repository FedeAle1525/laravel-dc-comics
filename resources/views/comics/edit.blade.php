@extends('layouts.app')

<!-- 2 - CRUD / Update / Edit -->
<!-- Form Precompilato per la Modifica di un Comic -->
@section('content')

<main>

  <div class="container text-center">
    <h1>Modifica Comic</h1>
  </div>

  <div class="container">

    <!-- 3 - CRUD / Update -->
    <!-- Faccio riferimento alla Rotta dello Update perchè i dati inseriti nel form verrano salvati nel DB tramite questa CRUD -->
    <form action="{{ route('comics.update', $comic) }}" method="post">
      @csrf <!-- Direttiva che genera un Input Nascosto con un Codice associato che riconosce il Form del Sito -->
      @method('put') <!-- Direttiva che permette di "trasformare" il metodo 'POST' del Form in un PUT -->

      <!-- I Value degli Input devono coincidono con il contenuto delle Colonne della Tabella, recuperati dal DB -->
      <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $comic->title) }}">
      </div>

      <div class="mb-3">
        <label class="form-label d-block">Descrizione</label>

        <!-- In caso di errore ripopolo l'input con il vecchio valore inviato (old), per evitare il più possibile il medesimo errore -->
        <textarea name="description" cols="100" rows="10">
        {{ old('description', $comic->description)  }}
        </textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Link Immagine</label>
        <input type="text" class="form-control" name="thumb" value="{{ old('thumb', $comic->thumb) }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Serie</label>
        <input type="text" class="form-control" name="series" value="{{ old('series', $comic->series) }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Tipologia</label>
        <select type="text" class="form-control" name="type">
          <option>Seleziona Tipologia</option>
          <!-- Gestione Valori 'Old' per <Select> -->
          <option @selected( old('type', $comic->type) == 'comic book' ) value="comic book">Comic Book</option>
          <option @selected( old('type', $comic->type) == 'graphic novel' ) value="graphic novel">Graphic Novel</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <div class="input-group">
          <input type="text" class="form-control" name="price" value="{{ old('price', $comic->price) }}">
          <span class="input-group-text">€</span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Data D'Uscita</label>
        <input type="date" class="form-control" name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}">
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-danger">Salva</button>
      </div>

    </form>

    <!-- Stampa degli Errori generati dalla Validazione della Richiesta (validi per UNA SESSIONE) -->
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

  </div>
</main>

@endsection