<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = DB::table('barangs')
            ->join('categories', 'barangs.kategori_id', '=', 'categories.id')
            ->select(
                'barangs.id',
                'nama_barang',
                'foto_barang',
                'stok_barang',
                'harga_barang',
                'categories.nama_kategori as kategori_barang'
            )
            ->get();
        return view('pages.data-master.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
            ->select('id', 'nama_kategori')
            ->get();
        return view('pages.data-master.barang.create', compact('categories'));
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
            'gte' => [
                'numeric' => ':Attribute harus lebih besar dari atau sama dengan :value.',
            ],
            'image' => 'File harus dalam bentuk gambar!',
            'max' => [
                'file' => 'Ukuran foto maksimal 2mb!',
            ],
            'numeric' => ':Attribute harus dalam format angka!'
        ];

        $this->validate($request, [
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'foto_barang' => 'image|max:2048',
            'stok_barang' => 'required|numeric|gte:1',
            'harga_barang' => 'required|numeric|gte:1',
            'kategori_barang' => 'required',
        ], $messages);

        $request->file('foto_barang') ? $request->file('foto_barang')->storeAs('images', $request->foto_barang->getClientOriginalName()) : null;

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'foto_barang' => $request->foto_barang == null ? null : $request->foto_barang->getClientOriginalName(),
            'stok_barang' => $request->stok_barang,
            'harga_barang' => $request->harga_barang,
            'kategori_id' => $request->kategori_barang,
            'pembuat_id' => auth()->user()->id,
            'perubah_id' => auth()->user()->id
        ]);

        return redirect('/master/barang')->with('success', 'Data barang telah berhasil ditambahkan!');
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
        $barang = DB::table('barangs')
            ->join('categories', 'barangs.kategori_id', '=', 'categories.id')
            ->select(
                'barangs.id as barang_id',
                'nama_barang',
                'deskripsi_barang',
                'foto_barang',
                'stok_barang',
                'harga_barang',
                'categories.id as kategori_id',
            )
            ->where('barangs.id', '=', $id)
            ->get();

        $categories = DB::table('categories')
            ->select('id', 'nama_kategori')
            ->get();

        return view('pages.data-master.barang.edit', compact('barang', 'categories'));
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
        $barang = Barang::whereId($id)->first();

        $messages = [
            'required' => 'Harap masukkan :attribute!',
            'gte' => [
                'numeric' => ':Attribute harus lebih besar dari atau sama dengan :value.',
            ],
            'image' => 'File harus dalam bentuk gambar!',
            'max' => [
                'file' => 'Ukuran foto maksimal 2mb!',
            ],
            'numeric' => ':Attribute harus dalam format angka!'
        ];

        $this->validate($request, [
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'foto_barang' => 'image|max:2048',
            'stok_barang' => 'required|numeric|gte:1',
            'harga_barang' => 'required|numeric|gte:1',
            'kategori_barang' => 'required',
        ], $messages);

        if ($request->foto_barang == null) {
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'stok_barang' => $request->stok_barang,
                'harga_barang' => $request->harga_barang,
                'kategori_id' => $request->kategori_barang,
                'pembuat_id' => auth()->user()->id,
                'perubah_id' => auth()->user()->id
            ]);

            return redirect('/master/barang')->with('success', 'Data barang telah berhasil diperbaharui!');
        } else {
            $fileName = $request->foto_barang->getClientOriginalName();
            $request->file('foto_barang') ? $request->file('foto_barang')->storeAs('images', $request->foto_barang->getClientOriginalName()) : null;

            $barang->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'foto_barang' => $fileName,
                'stok_barang' => $request->stok_barang,
                'harga_barang' => $request->harga_barang,
                'kategori_id' => $request->kategori_barang,
                'pembuat_id' => auth()->user()->id,
                'perubah_id' => auth()->user()->id
            ]);

            return redirect('/master/barang')->with('success', 'Data barang telah berhasil diperbaharui!');
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
        //
    }
}
