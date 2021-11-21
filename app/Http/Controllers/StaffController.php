<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::get();
        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
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
            'required' => 'Harap masukkan :attribute!',
            'email' => 'Format email harus valid!',
            'max' => [
                'string' => ':Attribute tidak boleh lebih dari :max karakter!',
            ]
        ];

        $this->validate($request, [
            'nama_staff' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat_staff' => 'required',
            'email_staff' => 'required|email:rfc,dns|max:225',
            'telp_staff' => 'required',
        ], $messages);

        Staff::create([
            'nama_staff' => $request->nama_staff,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat_staff' => $request->alamat_staff,
            'email_staff' => $request->email_staff,
            'telp_staff' => $request->telp_staff,
        ]);

        return redirect('/management/staff')->with('success', 'Data staff staff telah berhasil ditambahkan!');
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
        $staff = Staff::find($id);
        return view('staff.edit', compact('staff'));
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
        $messages = [
            'required' => 'Harap masukkan :attribute!',
            'email' => 'Format email harus valid!',
            'max' => [
                'string' => ':Attribute tidak boleh lebih dari :max karakter!',
            ]
        ];

        $this->validate($request, [
            'nama_staff' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat_staff' => 'required',
            'email_staff' => 'required|email:rfc,dns|max:225',
            'telp_staff' => 'required',
        ], $messages);

        $staff = Staff::whereId($id)->first();
        $staff->update([
            'nama_staff' => $request->nama_staff,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat_staff' => $request->alamat_staff,
            'email_staff' => $request->email_staff,
            'telp_staff' => $request->telp_staff,
        ]);

        return redirect('/management/staff')->with('success', 'Data staff telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();

        return redirect('/management/staff')->with('success', 'Data staff telah berhasil dihapus!');
    }
}
