<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LupaPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.reset-password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $messages = [
            'confirmed' => 'Konfirmasi password dan password tidak cocok!',
            'max' => [
                'string' => ':Attribute tidak boleh lebih dari :max karakter!',
            ],
            'min' => ['string' => ':Attribute minimal terdapat :min karakter!'],
            'required' => ':Attribute harus diisi!',
        ];

        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed'
        ], $messages);

        $user->where('username', $request->username)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Password telah berhasil diperbaharui!');
    }
}
