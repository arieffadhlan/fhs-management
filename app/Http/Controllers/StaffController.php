<?php

namespace App\Http\Controllers;

use App\Models\PenjualanBarang;
use App\Models\PenjualanStaff;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Staff;

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

    public function penjualan()
    {
        $stocks = Stock::get();
        $staffs = Staff::get();
        return view('penjualan.staff', compact('stocks', 'staffs'));
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
    public function storePenjualan(Request $request)
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

    public function storeStaff(Request $request)
    {
        $messages = [
            'required' => 'Harap masukkan :attribute!',
            'image' => 'File harus dalam bentuk gambar!',
            'max' => 'Ukuran file maxsimal 2mb!'
        ];

        $this->validate($request, [
            'nama_staff' => 'required',
            'jenis_kelamin'=> 'required',
            'tanggal_lahir'=> 'required|date',
            'alamat_staff'=> 'required',
            'email_staff'=> 'string|email|max:225',
            'telp_staff'=> 'required',
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
    public function editStaff($id)
    {
        $staffs = Staff::find($id);
        return view('staff.edit', compact('staffs'));
    }

    public function editPenjualan($id)
    {
        $stocks = Stock::get();
        $staffs = Staff::get();
        $penjualans = PenjualanStaff::whereId($id)->first();
        return view('penjualan.editStaff', compact('stocks', 'staffs', 'penjualans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStaff(Request $request, $id)
    {
        $staffs = Staff::whereId($id)->first();
        
        $staffs->update([
            'nama_staff' => $request->nama_staff,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat_staff' => $request->alamat_staff,
            'email_staff' => $request->email_staff,
            'telp_staff' => $request->telp_staff,
        ]);
        
        return redirect('/management/staff')->with('success', 'Data staff telah berhasil diubah!');
    }

    public function updatePenjualan(Request $request, $id)
    {
        $penjualans = PenjualanStaff::whereId($id)->first();

        $penjualans->update([
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
    public function destroyStaff($id)
    {
        $staff = Staff::whereId($id)->first();
        $staffs = Staff::find($id);
        $staffs->delete();
        
        return redirect('/management/staff')->with('success', 'Data staff telah berhasil dihapus!');
    }

    public function destroyPenjualan($id)
    {
        $penjualans = PenjualanStaff::find($id);
        $penjualans->delete();

        return redirect('/management/penjualan')->with('success', 'Data penjualan staff telah berhasil dihapus!');
    }
}
