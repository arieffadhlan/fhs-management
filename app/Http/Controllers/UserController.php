<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        if (auth()->user()->username == "admin") {
            $messages = [
                'confirmed' => 'Konfirmasi password dan password tidak cocok!',
                'image' => 'File harus dalam bentuk gambar!',
                'max' => [
                    'file' => 'Ukuran foto maxsimal 2mb!',
                    'string' => ':Attribute tidak boleh lebih dari :max karakter!',
                ],
                'min' => ['string' => ':Attribute minimal terdapat :min karakter!'],
                'required' => 'Harap masukkan :attribute!',
            ];

            $this->validate($request, [
                'fullname' => 'string|max:225',
                'password' => 'string|min:8|confirmed',
                'image' => 'image|max:2048'
            ], $messages);

            if ($request->image != null) {
                if (isset(auth()->user()->image)) {
                    unlink(storage_path('app/public/images/' . auth()->user()->image));
                    $request->file('image') ? $request->file('image')->storeAs('images', $request->image->getClientOriginalName()) : auth()->user()->image ?? null;
                    $user->where('username', auth()->user()->username)->update([
                        'image' => $request->image->getClientOriginalName(),
                    ]);
                } else {
                    $request->file('image') ? $request->file('image')->storeAs('images', $request->image->getClientOriginalName()) : auth()->user()->image ?? null;
                    $user->where('username', auth()->user()->username)->update([
                        'image' => $request->image->getClientOriginalName(),
                    ]);
                }
            } else if ($request->fullname != null) {
                $user->where('username', auth()->user()->username)->update([
                    'fullname' => $request->fullname,
                ]);
            } else {
                $user->where('username', auth()->user()->username)->update([
                    'password' => Hash::make($request->password),
                ]);
            }
        } else {
            $messages = [
                'alpha_num' => ':Attribute hanya boleh berisi huruf dan angka!',
                'confirmed' => 'Konfirmasi password dan password tidak cocok!',
                'email' => 'Format email harus valid!',
                'image' => 'File harus dalam bentuk gambar!',
                'max' => [
                    'file' => 'Ukuran foto maxsimal 2mb!',
                    'string' => ':Attribute tidak boleh lebih dari :max karakter!',
                ],
                'min' => ['string' => ':Attribute minimal terdapat :min karakter!'],
                'required' => 'Harap masukkan :attribute!',
                'unique' => ':Attribute sudah ada!',
            ];

            $this->validate($request, [
                'fullname' => 'string|max:225',
                'username' => 'alpha_num|min:3|max:25',
                'password' => 'string|min:8|confirmed',
                'email' => 'string|email:rfc,dns|max:225',
                'image' => 'image|max:2048'
            ], $messages);

            if ($request->image != null) {
                if (isset(auth()->user()->image)) {
                    unlink(storage_path('app/public/images/' . auth()->user()->image));
                    $request->file('image') ? $request->file('image')->storeAs('images', $request->image->getClientOriginalName()) : auth()->user()->image ?? null;
                    $user->where('username', auth()->user()->username)->update([
                        'image' => $request->image->getClientOriginalName(),
                    ]);
                } else {
                    $request->file('image') ? $request->file('image')->storeAs('images', $request->image->getClientOriginalName()) : auth()->user()->image ?? null;
                    $user->where('username', auth()->user()->username)->update([
                        'image' => $request->image->getClientOriginalName(),
                    ]);
                }
            } else if ($request->fullname != null && $request->username != null && $request->email != null) {
                $user->where('username', auth()->user()->username)->update([
                    'fullname' => $request->fullname,
                    'username' => $request->username,
                    'email' => $request->email,
                ]);
            } else {
                $user->where('username', auth()->user()->username)->update([
                    'password' => Hash::make($request->password),
                ]);
            }
        }

        return back()->with('success', 'Profil berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
