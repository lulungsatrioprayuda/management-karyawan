<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('unit', 'jabatan')->get();
        return response()->json($karyawans);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::create($request->all());
        $karyawan->jabatans()->attach($request->jabatan_ids);
        return response()->json($karyawan, 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::with('jabatans')->find($id);
        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }
        return response()->json($karyawan);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }

        $karyawan->update($request->all());
        $karyawan->jabatans()->sync($request->jabatan_ids);
        return response()->json($karyawan, 200);
    }
}
