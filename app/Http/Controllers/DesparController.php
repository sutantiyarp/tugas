<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Despar;
use Illuminate\Http\Request;

class DesparController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $despars = Despar::with('desa')->paginate(10);
        return view('layouts admin.despar.index', compact('despars'));
    }

    public function create()
    {
        $desas = Desa::all();
        return view('layouts admin.despar.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:despar,name', // Validate unique name
            'description' => 'required|string|max:500|unique:despar,description', // Validate unique description
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|between:1024,5120', // Validate image
            'village_id' => 'required|exists:desa,village_id',
            'price' => 'required|numeric|min:0',
        ]);

        $data = $request->only('name', 'description', 'village_id', 'price');

        // Cek dan simpan file image
        if ($request->hasFile('image')) {
            // Get the original file name and move it to the desired directory
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/img/despar'), $imageName);
            $data['image'] = $imageName; // Store the image name in the database
        }

        // Menyimpan data despar ke database
        Despar::create($data);

        return redirect()->route('despar.index')->with('success', 'Destinasi pariwisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $despar = Despar::findOrFail($id);
        $desas = Desa::all();
        return view('despar.edit', compact('despar', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $despar = Despar::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'village_id' => 'required|exists:desa,village_id',
            'price' => 'required|numeric|min:0',
        ]);

        $data = $request->only('name', 'description', 'village_id', 'price');

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($despar->image && file_exists(public_path('images/despar/' . $despar->image))) {
                unlink(public_path('images/despar/' . $despar->image));
            }

            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/despar'), $imageName);
            $data['image'] = $imageName;
        }

        $despar->update($data);

        return redirect()->route('despar.index')->with('success', 'Destinasi pariwisata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $despar = Despar::findOrFail($id);

        // Hapus file gambar jika ada
        if ($despar->image && file_exists(public_path('images/despar/' . $despar->image))) {
            unlink(public_path('images/despar/' . $despar->image));
        }

        $despar->delete();

        return redirect()->route('despar.index')->with('success', 'Destinasi pariwisata berhasil dihapus.');
    }
}
