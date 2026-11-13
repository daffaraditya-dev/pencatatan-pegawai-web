<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::latest()->get();
        return view('pegawai.index', compact('data'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawai,nip',
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email|unique:pegawai,email',
            'alamat' => 'nullable',
        ]);

        Pegawai::create($request->validated());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $item = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = Pegawai::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:pegawai,nip,' . $id,
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email|unique:pegawai,email,' . $id,
            'alamat' => 'nullable',
        ]);

        $item->update($request->validated());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diubah');
    }

    public function destroy(string $id)
    {
        Pegawai::destroy($id);
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai dihapus');
    }
}