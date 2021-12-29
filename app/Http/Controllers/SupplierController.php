<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = DB::table('suppliers')
            ->select('id', 'nama_pemasok', 'alamat_pemasok', 'telepon_pemasok')
            ->get();
        return view('pages.data-master.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.data-master.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = ['required' => 'Harap masukkan :attribute!'];

        $this->validate($request, [
            'nama_pemasok' => 'required',
            'alamat_pemasok' => 'required',
            'telepon_pemasok' => 'required'
        ], $messages);

        Supplier::create([
            'nama_pemasok' => $request->nama_pemasok,
            'alamat_pemasok' => $request->alamat_pemasok,
            'telepon_pemasok' => $request->telepon_pemasok
        ]);

        return redirect('/master/supplier')->with('success', 'Data pemasok telah berhasil ditambahkan!');
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
        $supplier = DB::table('suppliers')
            ->select('id', 'nama_pemasok', 'alamat_pemasok', 'telepon_pemasok')
            ->where('id', '=', $id)
            ->get();
        return view('pages.data-master.supplier.edit', compact('supplier'));
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
        $supplier = Supplier::whereId($id)->first();

        $messages = ['required' => 'Harap masukkan :attribute!'];

        $this->validate($request, [
            'nama_pemasok' => 'required',
            'alamat_pemasok' => 'required',
            'telepon_pemasok' => 'required'
        ], $messages);

        $supplier->update([
            'nama_pemasok' => $request->nama_pemasok,
            'alamat_pemasok' => $request->alamat_pemasok,
            'telepon_pemasok' => $request->telepon_pemasok
        ]);

        return redirect('/master/supplier')->with('success', 'Data pemasok telah berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect('/master/supplier')->with('success', 'Data pemasok telah berhasil dihapus!');
    }
}
