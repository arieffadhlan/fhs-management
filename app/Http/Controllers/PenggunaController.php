<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('pages.data-master.pengguna.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.data-master.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'confirmed' => 'Konfirmasi password dan password tidak cocok!',
            'email' => 'Format email harus valid!',
            'max' => [
                'string' => ':Attribute tidak boleh lebih dari :max karakter!',
            ],
            'min' => ['string' => ':Attribute minimal terdapat :min karakter!'],
            'required' => 'Harap masukkan :attribute!',
        ];

        $this->validate($request, [
            'fullname' => 'required|string|max:225',
            'username' => 'required|alpha_num|max:25|min:3',
            'email' => 'required|string|email:rfc,dns|max:225',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required'
        ], $messages);

        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => null,
            'role' => $request->role
        ]);

        return redirect('/master/pengguna')->with('success', 'Data pengguna telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.data-master.pengguna.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userData = User::find($id);
        $messages = [
            'confirmed' => 'Konfirmasi password dan password tidak cocok!',
            'email' => 'Format email harus valid!',
            'max' => [
                'string' => ':Attribute tidak boleh lebih dari :max karakter!',
            ],
            'min' => ['string' => ':Attribute minimal terdapat :min karakter!'],
            'required' => 'Harap masukkan :attribute!',
        ];

        $this->validate($request, [
            'fullname' => 'string|max:225',
            'username' => 'alpha_num|max:25|min:3',
            'email' => 'string|email:rfc,dns|max:225',
            'password' => 'nullable|string|min:8|confirmed',
        ], $messages);

        if ($request->password == null) {
            $userData->update([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $userData->password,
                'role' => $request->role,
            ]);
        } else {
            $userData->update([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        }

        return redirect('/master/pengguna')->with('success', 'Data pengguna telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/master/pengguna')->with('success', 'Data pengguna telah berhasil dihapus!');
    }
}
