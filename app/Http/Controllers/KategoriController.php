<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.pages.datakategori', [
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|unique:tb_kategori,nama',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nama.unique' => 'Nama sudah terdaftar',
            ]
        );

        $kategori = new Kategori;
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/datakategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required|unique:tb_kategori,nama,' . $id,
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nama.unique' => 'Nama sudah terdaftar',
            ]
        );

        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/datakategori')->with('update', 'Data berhasil ditambahkan');

    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/datakategori')->with('delete', 'Data berhasil ditambahkan');
    }
}