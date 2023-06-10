<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function all(Request $request)
    {
        $id_kategori = $request->input('id_kategori');

        $products = Product::where('id_kategori', $id_kategori)
            ->orderByDesc('id')
            ->get();

        return response()->json([
            'message' => 'success',
            'data' => $products
        ]);
    }
    public function topSoldProducts()
    {
        $products = Product::orderBy('rating', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'message' => 'success',
            'data' => $products
        ]);
    }
}
