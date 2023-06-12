<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Contact;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = new Contact([
            'nama' => $request->get('nama'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'deskripsi' => $request->get('deskripsi'),
        ]);
        $data->save();
        return redirect('/contact')->with('create', 'Pesanan Berhasil Dikirim');
    }
}
