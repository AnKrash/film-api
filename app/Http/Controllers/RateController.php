<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::all();
        return response()->json(['rates' => $rates]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'film_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rate = Rate::create($data);

        return response()->json(['rate' => $rate], 201);
    }

    public function show($id)
    {
        $rate = Rate::findOrFail($id);
        return response()->json(['rate' => $rate]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'film_id' => 'integer',
            'user_id' => 'integer',
            'rating' => 'integer|min:1|max:5',
        ]);

        $rate = Rate::findOrFail($id);
        $rate->update($data);

        return response()->json(['rate' => $rate]);
    }

    public function destroy($id)
    {
        $rate = Rate::findOrFail($id);
        $rate->delete();

        return response()->json(['message' => 'Rate deleted']);
    }
}

