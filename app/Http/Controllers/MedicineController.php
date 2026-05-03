<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        if (!auth()->user()->hasRole('manager')) {
            abort(403);
        }
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasRole('manager')) {
            abort(403);
        }
        $request->validate([
            'nama_obat' => 'required',
            'jenis' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);
        Medicine::create($request->all());
        return redirect()->route('medicines.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        if (auth()->user()->hasRole('manager')) {
            $request->validate([
                'nama_obat' => 'required',
                'jenis' => 'required',
                'stok' => 'required|integer',
                'harga' => 'required|numeric',
            ]);
            $medicine->update($request->all());
        } else {
            // Staff hanya boleh update stok
            $request->validate(['stok' => 'required|integer']);
            $medicine->update(['stok' => $request->stok]);
        }
        return redirect()->route('medicines.index')->with('success', 'Obat berhasil diupdate!');
    }

    public function destroy(Medicine $medicine)
    {
        if (!auth()->user()->hasRole('manager')) {
            abort(403);
        }
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Obat berhasil dihapus!');
    }
}