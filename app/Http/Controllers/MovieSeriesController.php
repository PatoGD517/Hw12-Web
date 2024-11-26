<?php

namespace App\Http\Controllers;

use App\Models\MovieSeries;
use Illuminate\Http\Request;

class MovieSeriesController extends Controller
{
    // List all movies/series
    public function index()
    {
        $movies = MovieSeries::all();
        return response()->json($movies);
    }

    // Store a new movie/series
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'classification' => 'required|string|max:100',
            'release_date' => 'required|date',
            'general_review' => 'required|string',
            'season' => 'nullable|string',
        ]);

        // Create a new movie/series
        $movie = MovieSeries::create($validatedData);

        return response()->json($movie, 201); // Respond with the newly created movie
    }

    // Show a specific movie/series by ID
    public function show($id)
    {
        $movie = MovieSeries::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        return response()->json($movie);
    }

    // Update an existing movie/series by ID
    public function update(Request $request, $id)
    {
        // Find the movie to update
        $movie = MovieSeries::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'classification' => 'required|string|max:100',
            'release_date' => 'required|date',
            'general_review' => 'required|string',
            'season' => 'nullable|string',
        ]);

        // Update the movie
        $movie->update($validatedData);

        return response()->json($movie);
    }

    // Delete a movie/series by ID
    public function destroy($id)
    {
        $movie = MovieSeries::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $movie->delete();

        return response()->json(['message' => 'Movie deleted successfully']);
    }
}
