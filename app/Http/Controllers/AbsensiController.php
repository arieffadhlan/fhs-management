<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Absence::all();
        return view('absensi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d H:i:s');

        if ($tanggal > Carbon::createFromTime(9, 0, 0))
        {
            $keterangan = 'Terlambat';
        } else {
            $keterangan = 'Tepat Waktu';
        }

        Absence::create([
            'nama' => $request->nama,
            'tanggal' => $tanggal,
            'kehadiran'  => $request->kehadiran,
            'keterangan' => $keterangan,
        ]);

        return redirect('/absensi')->with('Kirim', 'Data Sukses Dikirim');
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
        $data = Absence::findOrFail($id);
        return view('adm/edit', compact('data'));
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
        $data = Absence::findOrFail($id);
        $data->update($request->all());

        return redirect('admin')->with('Edit', 'Data Sukses Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Absence::findOrFail($id);
        // $data->delete($request->all());
        return redirect('admin')->with('hapus', 'Data Telah Di Hapus');
    }
}
