<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ComicController extends Controller
{
    // 1 - CRUD ---> Read ---> Index
    public function index()
    {

        $comics = Comic::all();

        // dd($comics);

        // "Compact" crea un Array associativo con la CHIAVE 'comics' a cui associa come VALORE l'omonima variabile $comics
        $data = compact('comics');

        // Nome della Vista dentro la cartella Comics, da non confondere con la Rotta
        return view('comics.index', $data);
    }

    // 1 - CRUD ---> Read ---> Show

    // Passando Istanza Comic al metodo e inviadola alla Vista, un automatismo di Laravel fara' la ricerca automatica per $id
    public function show(Comic $comic)
    {
        // Il metodo 'find' andrà a generare una Query che cerchera nella Tabella Books la riga con $id corrispondente
        // $book = Book::find($id);

        // Il metodo 'findOrFail' si comporta allo stesso modo del 'find', ma in caso di fallimento genera PAGINA 404
        // $book = Book::findOrFail($id);

        return view('comics.show', compact('comic'));
    }

    // 2 - CRUD ---> Create
    public function create()
    {
        return view('comics.create');
    }

    // 2 - CRUD ---> Create ---> Store
    // La variabile $request gestisce le Richieste dell'Utente tramite Form
    public function store(Request $request)
    {
        // Tramite il metodo "all" di $request, recupero tutti gli input (coppia name/value) creati nel Form in un Array Asociativo
        $data = $request->all();

        // Creo una nuova Istanza di Comic con i valori delle proprieta' uguali ai dati del Form contenuti in $request
        $newComic = new Comic();

        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];

        $newComic->save();

        // Al posto di ritornare una Vista, si fa un REDIRECT sulla Rotta 'show', ricordandoci che è una Rotta Parametrica quindi bisogna passare l'id riferito alla nuova entità
        return redirect()->route('comics.show', $newComic->id);
    }

    // 3 - CRUD ---> Update ---> Edit
    // Utilizzo la "Dependency Injection" come per il metodo 'show()', per recuperare i dati da passare al Form Precompilato
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }
}
