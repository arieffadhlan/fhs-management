<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $i = 0;
        // $len = count(Absence::get()->toArray());
        // if ($len != 0) {
        //     foreach (Absence::get() as $dataAbsensi) {
        //         if (date('d-m-Y', strtotime($dataAbsensi->tanggal)) == date('d-m-Y', strtotime('yesterday'))) {
        //             break;
        //         }

        //         if ($i == $len - 1 && date('d-m-Y', strtotime($dataAbsensi->tanggal)) != date('d-m-Y', strtotime('yesterday'))) {
        //             $kehadiran = "Tidak Hadir";
        //             $keterangan = 'Terlambat';
        //             Absence::create([
        //                 'nama' => auth()->user()->fullname,
        //                 'tanggal' =>  Carbon::parse(date('d-m-Y', strtotime('yesterday')))->format('Y-m-d H:i:s'),
        //                 'kehadiran'  => $kehadiran,
        //                 'keterangan' => $keterangan,
        //             ]);
        //             break;
        //         }

        //         $i++;
        //     }
        // }

        $absensis = Absence::get();
        $userAbsensis = Absence::where('nama', Auth::user()->fullname)->get();
        return view('pages.laporan.absensi.index', compact('absensis', 'userAbsensis'));
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
        $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d H:i:s');
        $cekJam = Carbon::NOW();

        if ($cekJam > Carbon::createFromTime(9, 0, 0) && $cekJam <= Carbon::createFromTime(23, 59, 0)) {
            $keterangan = 'Terlambat';
        } else {
            $keterangan = 'Tepat Waktu';
        }

        Absence::create([
            'nama' => $request->nama,
            'tanggal' => $tanggal,
            'kehadiran'  => $request->kehadiran,
            'keterangan' => $keterangan
        ]);

        return redirect('/laporan/absensi')->with('success', 'Absensi telah berhasil diisi!');
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
        $absensi = Absence::find($id);
        return view('pages.laporan.absensi.edit', compact('absensi'));
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
        $absensi = Absence::find($id);
        $absensi->update([
            'kehadiran'  => $request->kehadiran
        ]);

        return redirect('/absensi')->with('success', 'Data absensi telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absensi = Absence::find($id);
        $absensi->delete();
        return redirect('absensi')->with('success', 'Data absensi telah berhasil dihapus');
    }
}
