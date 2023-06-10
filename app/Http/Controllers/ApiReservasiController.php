<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiReservasiController extends Controller
{
    public function add(Request $request)
    {
        $user = $request->user();
        $id_user = $user->id;

        $data = $request->validate([
            'tanggal' => 'required',
            'id_meja' => 'required',
        ]);
        $reservasibelumselesai = Reservasi::where('id_user', $id_user)
        ->where('status', 'Menunggu Konfirmasi')
        ->first();
        if ($reservasibelumselesai) {
            return response()->json([
                'message' => 'Tidak dapat menambah reservasi. Masih ada reservasi sebelumnya masih belum dikonfirmasi',
            ], 500);
        }

        $reservasi = Reservasi::create([
            'id_user' => $id_user,
            'id_meja' => $data['id_meja'],
            'tanggal' => $data['tanggal'],
            'status' => 'Menunggu Konfirmasi',
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $reservasi,
        ], 200);
    }

    public function cancel(Request $request)
    {
        $data = $request->validate([
            'id_meja' => 'required',
        ]);
        $user = Auth::user();
        $reservasi = Reservasi::where('id_user', $user->id)
                                ->where('id_meja', $data['id_meja'])
                                ->first();

        if (!$reservasi) {
            return response()->json([
                'message' => 'Reservasi not found',
            ], 404);
        }

        $reservasi->status = 'Dibatalkan';
        $reservasi->save();

        return response()->json([
            'message' => 'success',
            'reservasi' => $reservasi,
        ]);
    }


    public function status(Request $request)
    {

        $user = $request->user();
        $id_user = $user->id;

        $data = $request->validate([
            'status' => 'required',
        ]);

        $reservasi = Reservasi::with(['user', 'meja'])->where('id_user', $id_user)
            ->where('status', $data['status'])
            ->orderByDesc('id')
            ->get();

        return response()->json([
            'message' => 'success',
            'data' => $reservasi,
        ], 200);
    }
}
