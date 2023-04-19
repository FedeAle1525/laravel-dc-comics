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
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
      </div>
      <!-- Gestione degli Errori per ogni Input con Bootstrap -->
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label class="form-label d-block">Descrizione</label>
        <!-- In caso di errore ripopolo l'input con il vecchio valore inviato (old), per evitare il più possibile il medesimo errore -->
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="100" rows="10">

        {{ old('description') }}

        </textarea>
      </div>
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label class="form-label">Link Immagine</label>
        <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb" value="{{ old('thumb') }}">
      </div>
      @error('thumb')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label class="form-label">Serie</label>
        <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" value="{{ old('series') }}">
      </div>
      @error('series')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label class="form-label @error('type') is-invalid @enderror">Tipologia</label>
        <select type="text" class="form-control" name="type">
          <option>Seleziona Tipologia</option>
          <!-- Gestione Valori 'Old' per <Select> -->
          <option @selected( old('type')=='comic book' ) value="comic book">Comic Book</option>
          <option @selected( old('type')=='graphic novel' ) value="graphic novel">Graphic Novel</option>
        </select>
      </div>
      @error('type')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <div class="input-group">
          <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
          <span class="input-group-text">€</span>
        </div>
      </div>
      @error('price')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label class="form-label">Data D'Uscita</label>
        <input type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" value="{{ old('sale_date') }}">
      </div>
      @error('sale_date')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Aggiungi</button>
      </div>

    </form>

    <!-- Stampa degli Errori generati dalla Validazione della Richiesta (validi per UNA SESSIONE) -->
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif -->

  </div>
</main>

@endsection