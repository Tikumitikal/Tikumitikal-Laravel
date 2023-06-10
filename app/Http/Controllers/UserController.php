<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id_role', '!=', '1')->get();
        return view('admin.pages.datauser', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:tb_user',
                'password' => 'required',
                'repassword' => 'required|same:password',
                'no_hp' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'repassword.required' => 'Re-Password tidak boleh kosong',
                'no_hp.required' => 'No HP tidak boleh kosong',
            ]
        );

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->no_hp = $request->no_hp;
        $user->id_role = '2';
        $user->save();

        return redirect('/datauser')->with('create', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:tb_user,email,' . $id,
                'password' => 'required',
                'repassword' => 'required|same:password',
                // sama dengan password
                'no_hp' => 'required',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'repassword.required' => 'Re-Password tidak boleh kosong',
                'no_hp.required' => 'No HP tidak boleh kosong',

            ]
        );

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->no_hp = $request->no_hp;
        $user->id_role = '2';
        $user->save();

        return redirect('/datauser')->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/datauser')->with('delete', 'Data berhasil dihapus');
    }
}