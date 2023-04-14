@extends('layouts.app')

@section('content')

<main>

  <!-- 1 - CRUD / Read / Show -->
  <div class="container">
    <h1 class="text-center"> {{$comic->title}} </h1>
  </div>

  <div class="container text-center py-3">
    <img src=" {{$comic->thumb}} " alt="">

    <p class="mt-3"> {{ $comic->description }} </p>
  </div>

  <div class="container">
    <h3>Dettagli:</h3>
    <ul>
      <li><span class="fst-italic">Serie</span> -> {{$comic->series}} </li>
      <li><span class="fst-italic">Tipologia</span> -> {{$comic->type}} </li>
      <li><span class="fst-italic">Data D'Uscita</span> -> {{$comic->sale_date}} </li>
      <li><span class="fst-italic">Prezzo</span> -> {{$comic->price}} </li>
    </ul>
  </div>
</main>

@endsection