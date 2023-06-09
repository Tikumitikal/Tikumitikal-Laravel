<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $products = Product::with('kategori')->get();
        return view('admin.pages.dataproduct', [
            'products' => $products,
            'kategori' => $kategori
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|unique:tb_product,nama',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harga' => 'required|numeric|gte:0',
                'deskripsi' => 'required',
                'rating' => 'required',
                'id_kategori' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nama.unique' => 'Nama sudah terdaftar',
                'image.required' => 'Foto tidak boleh kosong',
                'image.image' => 'Foto harus berupa gambar',
                'image.max' => 'Foto maksimal 2MB',
                'image.mimes' => 'Foto harus berupa jpeg,png,jpg,gif,svg',
                'harga.required' => 'Harga tidak boleh kosong',
                'harga.numeric' => 'Harga harus berupa angka',
                'harga.gte' => 'Harga tidak boleh kurang dari 0',
                'deskripsi.required' => 'Deskripsi tidak boleh kosong',
                'rating.required' => 'Rating tidak boleh kosong',
                'id_kategori.required' => 'Kategori tidak boleh kosong',
            ]
        );

        $fileNameImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('foto/product/'), $fileNameImage);

        $product = new Product;
        $product->nama = $request->nama;
        $product->image = $fileNameImage;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->rating = $request->rating;
        $product->id_kategori = $request->id_kategori;
        $product->save();

        return redirect()->intended('/dataproduct')->with('create', 'berhasil create');
    }

    public function update(Request $request, $id)
    {

        if ($request->image) {
            $request->validate(
                [
                    'nama' => 'required|unique:tb_product,nama,' . $id,
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'harga' => 'required|numeric|gte:0',
                    'deskripsi' => 'required',
                    'rating' => 'required',
                    'id_kategori' => 'required',
                ],
                [
                    'nama.required' => 'Nama tidak boleh kosong',
                    'nama.unique' => 'Nama sudah terdaftar',
                    'image.required' => 'Foto tidak boleh kosong',
                    'image.image' => 'Foto harus berupa gambar',
                    'image.max' => 'Foto maksimal 2MB',
                    'image.mimes' => 'Foto harus berupa jpeg,png,jpg,gif,svg',
                    'harga.required' => 'Harga tidak boleh kosong',
                    'harga.numeric' => 'Harga harus berupa angka',
                    'harga.gte' => 'Harga tidak boleh kurang dari 0',
                    'deskripsi.required' => 'Deskripsi tidak boleh kosong',
                    'rating.required' => 'Rating tidak boleh kosong',
                    'id_kategori.required' => 'Kategori tidak boleh kosong',
                ]
            );

            $deleteimage = Product::where('id', $id)->first();
            File::delete(public_path('foto/product') . '/' . $deleteimage->image);

            $fileNameImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('foto/product/'), $fileNameImage);

            $product = Product::find($id);
            $product->nama = $request->nama;
            $product->image = $fileNameImage;
            $product->harga = $request->harga;
            $product->deskripsi = $request->deskripsi;
            $product->rating = $request->rating;
            $product->id_kategori = $request->id_kategori;
            $product->save();


            return redirect()->intended('/dataproduct')->with('update', 'berhasil update');
        } else {
            $request->validate(
                [
                    'nama' => 'required|unique:tb_product,nama,' . $id,
                    'harga' => 'required|numeric|gte:0',
                    'deskripsi' => 'required',
                    'rating' => 'required|gte:0',
                    'id_kategori' => 'required',
                ],
                [
                    'nama.required' => 'Nama tidak boleh kosong',
                    'nama.unique' => 'Nama sudah terdaftar',
                    'harga.required' => 'Harga tidak boleh kosong',
                    'harga.numeric' => 'Harga harus berupa angka',
                    'harga.gte' => 'Harga tidak boleh kurang dari 0',
                    'deskripsi.required' => 'Deskripsi tidak boleh kosong',
                    'rating.required' => 'Rating tidak boleh kosong',
                    'id_kategori.required' => 'Kategori tidak boleh kosong',
                ]
            );


            $product = Product::find($id);
            $product->nama = $request->nama;
            $product->harga = $request->harga;
            $product->deskripsi = $request->deskripsi;
            $product->rating = $request->rating;
            $product->id_kategori = $request->id_kategori;
            $product->save();

            return redirect()->intended('/dataproduct')->with('update', 'berhasil update');
        }
    }

    public function destroy($id)
    {
        $deleteimage = Product::where('id', $id)->first();
        File::delete(public_path('foto/product') . '/' . $deleteimage->image);

        Product::destroy($id);
        return redirect()->intended('/dataproduct')->with('delete', 'berhasil delete');
    }

}