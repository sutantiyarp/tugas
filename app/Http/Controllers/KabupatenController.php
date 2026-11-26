<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data kabupaten beserta relasi provinsi, paginasi 10 per halaman
        $kabupatens = Kabupaten::with('provinsi')->paginate(10);
        return view('layouts admin.kabupaten.index', compact('kabupatens'));
    }

    public function create()
    {
        $provinsis = Provinsi::all(); // Untuk dropdown pilih provinsi
        return view('layouts admin.kabupaten.create', compact('provinsis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required|exists:provinsi,province_id',
            'name' => 'required|string|max:255|unique:kabupaten,name',
        ]);

        Kabupaten::create($request->only('province_id', 'name'));

        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kabupaten = Kabupaten::findOrFail($id);
        $provinsis = Provinsi::all();
        return view('kabupaten.edit', compact('kabupaten', 'provinsis'));
    }

    public function update(Request $request, $id)
    {
        $kabupaten = Kabupaten::findOrFail($id);

        $request->validate([
            'province_id' => 'required|exists:provinsi,province_id',
            'name' => 'required|string|max:255|unique:kabupaten,name,' . $kabupaten->regency_id . ',regency_id',
        ]);

        $kabupaten->update($request->only('province_id', 'name'));

        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kabupaten = Kabupaten::findOrFail($id);
        $kabupaten->delete();

        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil dihapus.');
    }
}
