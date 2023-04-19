@extends('layouts.app')

<!-- 2 - CRUD / Create -->
<!-- Form per la Creazione di un Nuovo Comic -->
@section('content')

<main>

  <div class="container text-center">
    <h1>Nuovo Comic</h1>
  </div>

  <!-- 2 - CRUD / Create / Store -->
  <!-- Faccio riferimento alla Rotta dello Store perchè i dati inseriti nel form verrano salvati nel DB tramite questa CRUD -->
  <div class="container">
    <form action="{{ route('comics.store') }}" method="POST">
      @csrf <!-- Direttiva che genera un Input Nascosto con un Codice associato che riconosce il Form del Sito -->

      <!-- I Name degli Input devono coincidere con il nome delle Colonne della Tabella -->
      <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
      </div>

      <div class="mb-3">
        <label class="form-label d-block">Descrizione</label>
        <!-- In caso di errore ripopolo l'input con il vecchio valore inviato (old), per evitare il più possibile il medesimo errore -->
        <textarea name="description" cols="100" rows="10">

        {{ old('description') }}

        </textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Link Immagine</label>
        <input type="text" class="form-control" name="thumb" value="{{ old('thumb') }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Serie</label>
        <input type="text" class="form-control" name="series" value="{{ old('series') }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Tipologia</label>
        <select type="text" class="form-control" name="type">
          <option>Seleziona Tipologia</option>
          <!-- Gestione Valori 'Old' per <Select> -->
          <option @selected( old('type')=='comic book' ) value="comic book">Comic Book</option>
          <option @selected( old('type')=='graphic novel' ) value="graphic novel">Graphic Novel</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <div class="input-group">
          <input type="text" class="form-control" name="price" value="{{ old('price') }}">
          <span class="input-group-text">€</span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Data D'Uscita</label>
        <input type="date" class="form-control" name="sale_date" value="{{ old('sale_date') }}">
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Aggiungi</button>
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