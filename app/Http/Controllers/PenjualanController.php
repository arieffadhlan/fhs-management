<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Pembelian;
use App\Models\Customer;
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
        $penjualans = PenjualanBarang::get();
        $penjualanStaff = PenjualanStaff::get();
        $staffs = Staff::get();
        $customers = Customer::get();
        return view('penjualan.index', compact('penjualans', 'penjualanStaff', 'customers', 'staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks = Stock::get();
        return view('penjualan.create', compact('stocks'));
    }

    public function createCustomer()
    {
        $stocks = Stock::get();
        $customers = Customer::get();
        return view('penjualan.customer', compact('customers', 'stocks'));
    }

    public function createStaff()
    {
        $stocks = Stock::get();
        $staffs = Staff::get();
        return view('penjualan.staff', compact('stocks', 'staffs'));
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
            'required' => 'Harap masukkan :attribute!'
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

    public function storeCustomer(Request $request)
    {
        $messages = [
            'required' => 'Harap masukkan :attribute!'
        ];

        $this->validate($request, [
            'nama_barang' => 'required',
            'jumlah_pembelian'  => 'required',
            'tanggal_masuk' => 'required|date',
        ], $messages);

        Pembelian::create([
            'customer_id' => $request->customer_id,
            'nama_barang' => $request->nama_barang,
            'jumlah_pembelian'  => $request->jumlah_pembelian,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect('/management/penjualan')->with('success', 'Pembelian Customer telah berhasil ditambahkan!');
    }

    public function storeStaff(Request $request)
    {
        $messages = [
            'required' => 'Harap masukkan :attribute!',
            'image' => 'File harus dalam bentuk gambar!',
            'max' => 'Ukuran file maxsimal 2mb!'
        ];

        $this->validate($request, [
            'staff_id' => 'required',
            'nama_barang' => 'required',
            'jumlah_penjualan'  => 'required',
            'tanggal_penjualan' => 'required|date',
        ], $messages);

        PenjualanStaff::create([
            'staff_id' => $request->staff_id,
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
        $stocks = Stock::get();
        $penjualan = PenjualanBarang::find($id);
        return view('penjualan.editBarang', compact('penjualan', 'stocks'));
    }

    public function editCustomer($id)
    {
        $pembelians = Pembelian::whereId($id)->first();
        $stocks = Stock::get();
        $customers = Customer::get();
        return view('penjualan.editCustomer', compact('customers', 'stocks', 'pembelians'));
    }

    public function editStaff($id)
    {
        $stocks = Stock::get();
        $staffs = Staff::get();
        $penjualan = PenjualanStaff::whereId($id)->first();
        return view('penjualan.editStaff', compact('stocks', 'staffs', 'penjualan'));
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
            'required' => 'Harap masukkan :attribute!'
        ];

        $this->validate($request, [
            'nama_barang' => 'required',
            'jumlah_barang'  => 'required',
            'tanggal_keluar' => 'required|date',
        ], $messages);

        $penjualan = PenjualanBarang::whereId($id)->first();

        Stock::where('nama_barang', $penjualan->nama_barang)->update([
            'jumlah_barang' => Stock::where('nama_barang', $penjualan->nama_barang)->first()->jumlah_barang + $penjualan->jumlah_barang
        ]);

        $penjualan->update([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang'  => $request->jumlah_barang,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        Stock::where('nama_barang', $request->nama_barang)->update([
            'jumlah_barang' => Stock::where('nama_barang', $request->nama_barang)->first()->jumlah_barang - $request->jumlah_barang
        ]);

        return redirect('/management/penjualan')->with('success', 'Data penjualan telah berhasil diubah!');
    }

    public function updateCustomer(Request $request, $id)
    {
        $messages = [
            'required' => 'Harap masukkan :attribute!'
        ];

        $this->validate($request, [
            'customer_id' => 'required',
            'nama_barang' => 'required',
            'jumlah_pembelian'  => 'required',
            'tanggal_masuk' => 'required|date',
        ], $messages);

        $pembelian = Pembelian::whereId($id)->first();
        $pembelian->update([
            'customer_id' => $request->customer_id,
            'nama_barang' => $request->nama_barang,
            'jumlah_pembelian'  => $request->jumlah_pembelian,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect('/management/penjualan')->with('success', 'Data Pembelian Customer telah berhasil diubah!');
    }

    public function updateStaff(Request $request, $id)
    {
        $messages = [
            'required' => 'Harap masukkan :attribute!',
        ];

        $this->validate($request, [
            'staff_id' => 'required',
            'nama_barang' => 'required',
            'jumlah_penjualan'  => 'required',
            'tanggal_penjualan' => 'required|date',
        ], $messages);

        $penjualan = PenjualanStaff::whereId($id)->first();
        $penjualan->update([
            'staff_id' => $request->staff_id,
            'nama_barang' => $request->nama_barang,
            'jumlah_penjualan'  => $request->jumlah_penjualan,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);

        return redirect('/management/penjualan')->with('success', 'Data penjualan staff telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan = PenjualanBarang::find($id);

        Stock::where('nama_barang', $penjualan->nama_barang)->update([
            'jumlah_barang' => Stock::where('nama_barang', $penjualan->nama_barang)->first()->jumlah_barang + $penjualan->jumlah_barang
        ]);

        $penjualan->delete();

        return redirect('/management/penjualan')->with('success', 'Data penjualan telah berhasil dihapus!');
    }

    public function destroyCustomer($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();

        return redirect('/management/penjualan')->with('success', 'Data pembelian customer telah berhasil dihapus!');
    }

    public function destroyStaff($id)
    {
        $penjualan = PenjualanStaff::find($id);
        $penjualan->delete();

        return redirect('/management/penjualan')->with('success', 'Data penjualan staff telah berhasil dihapus!');
    }
}
