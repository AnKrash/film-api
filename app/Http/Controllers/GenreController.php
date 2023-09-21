<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json(['genres' => $genres]);
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json(['genre' => $genre]);
    }
}

