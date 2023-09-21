<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Collection;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        // Get a list of all movies
        $films = Film::query();

        // Search by movie title (if the title parameter is passed)
        if ($request->has('title')) {
            $films->where('title', 'like', '%' . $request->input('title') . '%');
        }

        // Get films
        $films = $films->get();
        // Convert the films to a collection
        $filmsCollection = new Collection($films);

        // Transform the collection to add "country" name
        $filmsCollection->map(function ($film) {
            $countryName = DB::table('countries')->find($film->country_id)->name;
            $film->country = $countryName;
            unset($film->country_id); // Remove the country_id field
            return $film;
        });

        // Return a list of movies in JSON format
        return response()->json($films);
    }

    public function show($id)
    {
        // Find movie by ID
        $film = Film::with('genres')->find($id);

        $filmsCollection = new Collection([$film]);
        $filmsCollection->map(function ($film) {
            $countryName = DB::table('countries')->find($film->country_id)->name;
            $film->country = $countryName;
            unset($film->country_id); // Remove the country_id field
            return $film;
        });
        // Return the found movie in JSON format
        return response()->json($film);
    }


    public function store(Request $request)
    {

        // Define validation rules
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'country' => 'required',
            'film_genre' => 'required',
            'cover' => 'required|file',
        ];

        // Define error messages
        $messages = [
            'required' => 'The :attribute field is required.',
            'image' => 'The :attribute field must be an file.',
        ];

        // Perform validation


        $request->validate($rules, $messages);

        // Check if the cover image exists in the request
        if ($request->hasFile('cover')) {
            // Process and store the cover image
            $coverPath = $request->file('cover')->store('covers', 'public');

            // Resize and save the cover image
            Image::make(public_path("storage/{$coverPath}"))
                ->fit(300, 400)
                ->save();
        } else {
            // Handle the case where cover image is missing
            return response()->json(['error' => 'Cover image is required.'], 400);
        }

        $countryName = $request->input('country');

        // Find the corresponding country from the "countries" table by name
        $country = DB::table('countries')->where('name', $countryName)->first();

        // Check if the country exists
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }

        // Create a new film record in the database and set the "country_id"
        $film = Film::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'cover' => $coverPath, // Make sure cover path is correctly assigned
            'country_id' => $country->id, // Set the "country_id" based on the found country
        ]);

        // Attach genres to the newly created film
        $film->genres()->attach($request->input('genres'));

        // Set the cover attribute of the film model to the cover path and save it
        $film->cover = $coverPath;
        $film->save();

        // Attach genres to the newly created film
        $film->genres()->attach($request->input('genres'));

        // Set the cover attribute of the film model to the cover path and save it
        $film->cover = $coverPath;
        $film->save();

        // Return the created film as JSON with a 201 status code
        return response()->json($film, 201);
    }

    public function update(Request $request, $id)
    {
        // Find movie by ID
        $film = Film::find($id);

        if (!$film) {
            // If the movie is not found, return an error message
            return response()->json(['message' => 'Фильм не найден'], 404);
        }

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'country' => 'required',
            'film_genre' => 'required',
            'cover' => 'required|file',
        ];

        // Define error messages
        $messages = [
            'required' => 'The :attribute field is required.',
            'image' => 'The :attribute field must be an file.',
        ];

        // Perform validation


        $request->validate($rules, $messages);

        $country = DB::table('countries')->where('name', $request->input('country'))->first();

        if (!$country) {
            return response()->json(['error' => 'Страна не найдена'], 400);
        }
        // Update movie data

        $film->update($request->only(['title', 'description', 'cover']) + ['country_id' => $country->id]);

        // Update linked genres
        $film->genres()->sync($request->input('genres'));

        // Return the updated movie in JSON format
        return response()->json($film);
    }

    public function destroy($id)
    {
        // Find movie by ID
        $film = Film::find($id);

        if (!$film) {
            // If the movie is not found, return an error message
            return response()->json(['message' => 'Фильм не найден'], 404);
        }

        // Delete the movie and unlink genres
        $film->genres()->detach();
        $film->delete();

        // Return a successful message
        return response()->json(['message' => 'Фильм успешно удален']);
    }
}

