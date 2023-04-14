<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

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
}
