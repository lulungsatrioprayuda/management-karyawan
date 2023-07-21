<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('jabatan:nama_jabatan')->select('id', 'nama', 'username', 'unit_id')->with('unit:id,nama_unit')->get();
        return response()->json($karyawans);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->input('password'));

        $karyawan = Karyawan::create($data);
        $karyawan->jabatan()->attach($request->input('jabatan_ids'));
        return response()->json($karyawan, 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::with('jabatan')->find($id);
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

        $data = $request->all();
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($request->input('password'));
        }

        $karyawan->update($data);
        $karyawan->jabatan()->sync($request->jabatan_ids);
        return response()->json($karyawan, 200);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }
        $karyawan->jabatan()->detach();
        $karyawan->delete();
        return response()->json(['message' => 'Karyawan berhasil dihapus'], 200);
    }
}
