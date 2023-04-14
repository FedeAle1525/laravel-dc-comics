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
}
