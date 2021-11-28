<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::get();
        return view('stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create');
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
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'deskripsi_barang' => 'required',
            'jumlah_barang' => 'required|numeric',
            'image' => 'image|max:2048'
        ], $messages);

        $request->file('image') ? $request->file('image')->storeAs('images', $request->image->getClientOriginalName()) : null;
        Stock::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'image' => $request->image->getClientOriginalName() ?? null,
        ]);

        return redirect('/management/stock')->with('success', 'Penambahan data stok telah berhasil!');
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
        $stock = Stock::find($id);
        return view('stock.edit', compact('stock'));
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
        $stocks = Stock::whereId($id)->first();

        $messages = [
            'required' => 'Harap masukkan :attribute!',
            'image' => 'File harus dalam bentuk gambar!',
            'max' => 'Ukuran file maxsimal 2mb!'
        ];

        $this->validate($request, [
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'deskripsi_barang' => 'required',
            'jumlah_barang' => 'required|numeric',
            'image' => 'image|max:2048'
        ], $messages);

        if ($request->image == '') {
            $stocks->update([
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => $request->kategori_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'jumlah_barang' => $request->jumlah_barang
            ]);

            return redirect('/management/stock')->with('success', 'Perubahan data stok telah berhasil!');
        } else {
            $fileName = $request->image->getClientOriginalName();
            $request->file('image') ? $request->file('image')->storeAs('images', $request->image->getClientOriginalName()) : null;

            $stocks->update([
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => $request->kategori_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'jumlah_barang' => $request->jumlah_barang,
                'image' => $fileName,
            ]);

            return redirect('/management/stock')->with('success', 'Perubahan data stok telah berhasil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();

        return redirect('/management/stock')->with('success', 'Penghapusan data stok telah berhasil!');
    }
}
