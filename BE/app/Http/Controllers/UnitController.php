<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return response()->json($units);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255'
        ]);

        $unit = Unit::create($request->all());
        return response()->json($unit, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($unit);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255'
        ]);

        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }

        $unit->update($request->all());
        return response()->json($unit, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }

        $unit->delete();
        return response()->json(['message' => 'Unit berhasil dihapus'], Response::HTTP_NO_CONTENT);
    }
}
