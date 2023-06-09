<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = DB::table('tb_reservasi')
            ->join('tb_user', 'tb_reservasi.id_user', '=', 'tb_user.id')
            ->join('tb_meja', 'tb_reservasi.id_meja', '=', 'tb_meja.id')
            ->select('tb_reservasi.*', 'tb_user.nama', 'tb_meja.no_meja')
            ->get();

        return view('admin.pages.datareservasi', [
            'reservasi' => $reservasi
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        Reservasi::where('id', $id)
            ->update([
                'status' => $request->status,
            ]);

        return redirect('/datareservasi')->with('update', 'Data Reservasi Berhasil Diubah!');
    }
}