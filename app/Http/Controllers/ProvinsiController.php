<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsis = Provinsi::paginate(10);
        return view('layouts admin.provinsi.index', compact('provinsis'));
    }

    public function create()
    {
        return view('layouts admin.provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:provinsi,name',
        ]);

        Provinsi::create($request->only('name'));

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:provinsi,name,' . $provinsi->province_id . ',province_id',
        ]);

        $provinsi->update($request->only('name'));

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus.');
    }
}
