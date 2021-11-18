<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Pembelian;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::get();
        $customers = Customer::get();
        return view('penjualan.customer', compact('customers', 'stocks'));
    }

    public function index2()
    {
        $stocks = Stock::get();
        $customers = Customer::get();
        return view('Customer.index', compact('customers', 'stocks'));
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
            'nama_customer' => 'required',
            'kategori_daerah' => 'required',
            'alamat_customer' => 'required',
            'telp_customer' => 'required|numeric',
        ], $messages);

        Customer::create([
            'nama_customer' => $request->nama_customer,
            'kategori_daerah' => $request->kategori_daerah,
            'alamat_customer' => $request->alamat_customer,
            'telp_customer' => $request->telp_customer,
        ]);
        
        return redirect('/management/penjualan/customer')->with('success', 'Data Customer telah berhasil ditambahkan!');
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
        $pembelians = Pembelian::whereId($id)->first();
        $stocks = Stock::get();
        $customers = Customer::get();
        return view('penjualan.editCustomer', compact('customers', 'stocks', 'pembelians'));
    }

    public function editData($id)
    {
        // $stocks = Stock::get();
        $customers = Customer::whereId($id)->first();
        return view('Customer.edit', compact('customers'));
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
        $pembelians = Pembelian::whereId($id)->first();
        
        $pembelians->update([
            'customer_id' => $request->customer_id,
            'nama_barang' => $request->nama_barang,
            'jumlah_pembelian'  => $request->jumlah_pembelian,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect('/management/penjualan')->with('success', 'Data Pembelian Customer telah berhasil diubah!');
    }

    public function updateData(Request $request, $id)
    {
        $customers = Customer::whereId($id)->first();
        
        $customers->update([
            'nama_customer' => $request->nama_customer,
            'kategori_daerah' => $request->kategori_daerah,
            'alamat_customer' => $request->alamat_customer,
            'telp_customer' => $request->telp_customer,
        ]);

        return redirect('/management/customer')->with('success', 'Data Customer telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelians=Pembelian::find($id);
        $pembelians->delete();

        return redirect('/management/penjualan')->with('success', 'Data Pembelian Customer telah berhasil dihapus!');
    }
}
