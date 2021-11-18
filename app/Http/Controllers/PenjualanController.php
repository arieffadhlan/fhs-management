<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Customer;
use App\Models\Pembelian;
use App\Models\Stock;
use App\Models\PenjualanBarang;
use App\Models\PenjualanStaff;
use App\Models\Staff;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $staffs = Staff::All();
        $customer = Customer::All();
        $penjualan = PenjualanBarang::get();
        $penjualanStaff = PenjualanStaff::get();
        return view('penjualan.index', compact('penjualan','penjualanStaff','customer','staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = Stock::get();
        return view('penjualan.create', compact('stock'));
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
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'deskripsi_barang' => 'required',
            'jumlah_barang' => 'required|numeric',
            'image' => 'image|max:2048'
        ], $messages);

        $request->file('image') ? $request->file('image')->storeAs('images', $request->image->getClientOriginalName()) : null;
        Penjualan::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'image' => $request->image->getClientOriginalName() ?? null,
        ]);

        return redirect('/management/stock')->with('success', 'Penambahan Barang telah Berhasil!');
    }
    public function store2(Request $request)
    {
        $messages = [
            'required' => 'Harap masukkan :attribute!',
            'image' => 'File harus dalam bentuk gambar!',
            'max' => 'Ukuran file maxsimal 2mb!'
        ];

        $this->validate($request, [
            'nama_barang' => 'required',
            'jumlah_barang'  => 'required',
            'tanggal_keluar' => 'required|date',
        ], $messages);

        PenjualanBarang::create([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang'  => $request->jumlah_barang,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        Stock::where('nama_barang', $request->nama_barang)->update([
            'jumlah_barang' => Stock::where('nama_barang', $request->nama_barang)->first()->jumlah_barang - $request->jumlah_barang
        ]);
        
        return redirect('/management/penjualan')->with('success', 'Data penjualan telah berhasil ditambahkan!');
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
    public function editBarang($id)
    {
        $penjualans = PenjualanBarang::find($id);
        $stock = Stock::get();
        return view('penjualan.editBarang', compact('penjualans', 'stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function updateBarang(Request $request, $id)
    {
        $penjualans = PenjualanBarang::whereId($id)->first();

        $penjualans->update([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang'  => $request->jumlah_barang,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        return redirect('/management/penjualan')->with('success', 'Data penjualan telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBarang($id)
    {
        $penjualan = PenjualanBarang::whereId($id)->first();
        $penjualans = PenjualanBarang::find($id);
        $penjualans->delete();

        return redirect('/management/penjualan')->with('success', 'Data penjualan telah berhasil dihapus!');
    }
}
