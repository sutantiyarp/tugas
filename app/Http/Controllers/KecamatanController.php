<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilkan kecamatan dengan relasi kabupaten
        $kecamatans = Kecamatan::with('kabupaten')->paginate(10);
        return view('layouts admin.kecamatan.index', compact('kecamatans'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::all(); // Dropdown pilih kabupaten
        return view('layouts admin.kecamatan.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'regency_id' => 'required|exists:kabupaten,regency_id',
            'name' => 'required|string|max:255|unique:kecamatan,name',
        ]);

        Kecamatan::create($request->only('regency_id', 'name'));

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kabupatens = Kabupaten::all();
        return view('kecamatan.edit', compact('kecamatan', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        $request->validate([
            'regency_id' => 'required|exists:kabupaten,regency_id',
            'name' => 'required|string|max:255|unique:kecamatan,name,' . $kecamatan->district_id . ',district_id',
        ]);

        $kecamatan->update($request->only('regency_id', 'name'));

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil dihapus.');
    }
}
