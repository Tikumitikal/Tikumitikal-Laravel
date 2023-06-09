<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;

class MejaController extends Controller
{
    public function index()
    {
        $meja = Meja::all();
        return view('admin.pages.datameja', [
            'meja' => $meja
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'no_meja' => 'required|unique:tb_meja,no_meja|gte:0',
            ],
            [
                'no_meja.required' => 'No Meja tidak boleh kosong',
                'no_meja.unique' => 'No Meja sudah terdaftar',
                'no_meja.gte' => 'No Meja tidak boleh minus',
            ]
        );

        $kategori = new Meja;
        $kategori->no_meja = $request->no_meja;
        $kategori->save();

        return redirect('/datameja')->with('create', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_meja' => 'required|gte:0|unique:tb_meja,no_meja,' . $id,
            ],
            [
                'no_meja.required' => 'No Meja tidak boleh kosong',
                'no_meja.gte' => 'No Meja tidak boleh minus',
                'no_meja.unique' => 'No Meja sudah terdaftar',
            ]
        );

        $kategori = Meja::find($id);
        $kategori->no_meja = $request->no_meja;
        $kategori->save();

        return redirect('/datameja')->with('update', 'Data berhasil ditambahkan');

    }

    public function destroy($id)
    {
        $kategori = Meja::find($id);
        $kategori->delete();

        return redirect('/datameja')->with('delete', 'Data berhasil ditambahkan');
    }
}