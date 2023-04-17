@extends('layouts.app')

<!-- 2 - CRUD / Create -->
<!-- Form per la Creazione di un Nuovo Comic -->
@section('content')

<main>

  <div class="container text-center">
    <h1>Nuovo Comic</h1>
  </div>
  <div class="container">
    <form action="{{ route('comics.store') }}" method="POST">
      @csrf <!-- Direttiva che genera un Input Nascosto con un Codice associato che riconosce il Form del Sito -->

      <!-- I Name degli Input devono coincidere con il nome delle Colonne della Tabella -->
      <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control" name="title">
      </div>

      <div class="mb-3">
        <label class="form-label d-block">Descrizione</label>
        <textarea name="description" cols="100" rows="10"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Link Immagine</label>
        <input type="text" class="form-control" name="thumb">
      </div>

      <div class="mb-3">
        <label class="form-label">Serie</label>
        <input type="text" class="form-control" name="series">
      </div>

      <div class="mb-3">
        <label class="form-label">Tipologia</label>
        <input type="text" class="form-control" name="type">
      </div>

      <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <div class="input-group">
          <input type="text" class="form-control" name="price">
          <span class="input-group-text">€</span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Data D'Uscita</label>
        <input type="date" class="form-control" name="sale_date">
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Aggiungi</button>
      </div>

    </form>
  </div>
</main>

@endsection