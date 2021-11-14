<?php

namespace App\Http\Controllers;

use App\Models\PenjualanStaff;
use Illuminate\Http\Request;
use App\Models\Stock;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::get();
        return view('penjualan.staff', compact('stocks'));
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
        $messages = [
            'required' => 'Harap masukkan :attribute!',
            'image' => 'File harus dalam bentuk gambar!',
            'max' => 'Ukuran file maxsimal 2mb!'
        ];

        $this->validate($request, [
            'nama_staff' => 'required',
            'nama_barang' => 'required',
            'jumlah_penjualan'  => 'required',
            'tanggal_penjualan' => 'required|date',
        ], $messages);

        PenjualanStaff::create([
            'nama_staff' => $request->nama_staff,
            'nama_barang' => $request->nama_barang,
            'jumlah_penjualan'  => $request->jumlah_penjualan,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);
        
        return redirect('/management/penjualan')->with('success', 'Data penjualan staff telah berhasil ditambahkan!');
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
    public function update(Request $request, $id)
    {
        //
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
