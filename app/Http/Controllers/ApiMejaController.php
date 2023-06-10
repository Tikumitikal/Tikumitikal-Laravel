<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class ApiMejaController extends Controller
{
    public function all()
    {
        $table = Meja::all();

        return response()->json([
            'message' => 'success',
            'data' => $table,
        ]);
    }
}
