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
        $customers = Customer::get();
        return view('pages.data-master.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.data-master.customer.create');
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

        return redirect('master/customer')->with('success', 'Data customer telah berhasil ditambahkan!');
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
        $customers = Customer::whereId($id)->first();
        return view('pages.data-master.customer.edit', compact('customers'));
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
            'nama_customer' => 'required',
            'kategori_daerah' => 'required',
            'alamat_customer' => 'required',
            'telp_customer' => 'required|numeric',
        ], $messages);

        $customers = Customer::whereId($id)->first();
        $customers->update([
            'nama_customer' => $request->nama_customer,
            'kategori_daerah' => $request->kategori_daerah,
            'alamat_customer' => $request->alamat_customer,
            'telp_customer' => $request->telp_customer,
        ]);

        return redirect('master/customer')->with('success', 'Data customer telah berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/master/customer')->with('success', 'Data customer telah berhasil dihapus!');
    }
}
