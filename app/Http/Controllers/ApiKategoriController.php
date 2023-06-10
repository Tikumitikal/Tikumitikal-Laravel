<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class ApiKategoriController extends Controller
{
    public function all()
    {

        $kategories = Kategori::all();

        return response()->json([
            'message' => 'success',
            'data' => $kategories
        ]);
    }
}
