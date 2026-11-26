<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilkan desa dengan relasi kecamatan
        $desas = Desa::with('kecamatan')->paginate(10);
        return view('layouts admin.desa.index', compact('desas'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all(); // Dropdown pilih kecamatan
        return view('layouts admin.desa.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required|exists:kecamatan,district_id',
            'name' => 'required|string|max:255|unique:desa,name',
        ]);

        Desa::create($request->only('district_id', 'name'));

        return redirect()->route('desa.index')->with('success', 'Desa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $desa = Desa::findOrFail($id);
        $kecamatans = Kecamatan::all();
        return view('desa.edit', compact('desa', 'kecamatans'));
    }

    public function update(Request $request, $id)
    {
        $desa = Desa::findOrFail($id);

        $request->validate([
            'district_id' => 'required|exists:kecamatan,district_id',
            'name' => 'required|string|max:255|unique:desa,name,' . $desa->village_id . ',village_id',
        ]);

        $desa->update($request->only('district_id', 'name'));

        return redirect()->route('desa.index')->with('success', 'Desa berhasil diupdate.');
    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();

        return redirect()->route('desa.index')->with('success', 'Desa berhasil dihapus.');
    }
}
