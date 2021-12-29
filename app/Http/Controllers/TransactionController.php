<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $transactions = DB::table('transactions')
                ->select(
                    'id',
                    'nama_barang',
                    'kategori_barang',
                    'jumlah_transaksi',
                    'status_barang',
                    'nama_pelanggan',
                    'transactions.created_at as tanggal_keluar_masuk'
                )
                ->get();

            return view('pages.laporan.transaksi-barang.index', compact('transactions'));
        } else {
            $transactions = DB::table('transactions')
                ->join('users', 'transactions.petugas_id', '=', 'users.id')
                ->select(
                    'transactions.id',
                    'nama_barang',
                    'kategori_barang',
                    'jumlah_transaksi',
                    'status_barang',
                    'nama_pelanggan',
                    'transactions.created_at as tanggal_keluar'
                )
                ->where('transactions.petugas_id', '=', Auth::user()->id)
                ->get();

            $customers = DB::table('customers')
                ->select(
                    'nama_customer',
                )
                ->get();

            return view('pages.staff.index', compact('transactions', 'customers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = DB::table('barangs')
            ->select('id', 'nama_barang', 'stok_barang')
            ->get();

        $suppliers = DB::table('suppliers')
            ->select(
                'nama_pemasok',
            )
            ->get();

        $customers = DB::table('customers')
            ->select('nama_customer')
            ->get();

        return view('pages.transaksi.create', compact('barangs', 'suppliers', 'customers'));
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
            'numeric' => ':Attribute harus dalam format angka!'
        ];

        $this->validate($request, [
            'nama_barang' => 'required',
            'status_barang' => 'required',
            'jumlah_transaksi' => 'required|numeric|gte:1'
        ], $messages);

        $getDataBarang = Barang::where('id', $request->nama_barang)->first();
        $namaBarang = $getDataBarang->nama_barang;
        $stokBarang = $getDataBarang->stok_barang;
        $setKategoriBarang = $getDataBarang->kategori_id;
        $getKategoriBarang = Category::where('id', $setKategoriBarang)->first()->nama_kategori;

        if ($request->status_barang == 'keluar') {
            if ($stokBarang == 0 || $request->jumlah_transaksi > $stokBarang) {
                return back()->with('error', 'Jumlah stok tidak mencukupi!');
            }

            $messagesCustomer = ['required' => 'Harap masukkan :attribute'];

            if ($request->alamat_customer == null && $request->telp_customer == null) {
                $this->validate($request, ['nama_customer' => 'required'], $messagesCustomer);

                Transaction::create([
                    'nama_barang' => $namaBarang,
                    'kategori_barang' => $getKategoriBarang,
                    'jumlah_transaksi' => $request->jumlah_transaksi,
                    'status_barang' => $request->status_barang,
                    'nama_pelanggan' => $request->nama_customer,
                    'petugas_id' => auth()->user()->id
                ]);
            } else {
                $this->validate($request, [
                    'nama_customer2' => 'required',
                    'kategori_daerah' => 'required',
                    'alamat_customer' => 'required',
                    'telp_customer' => 'required'
                ], $messagesCustomer);

                Transaction::create([
                    'nama_barang' => $namaBarang,
                    'kategori_barang' => $getKategoriBarang,
                    'jumlah_transaksi' => $request->jumlah_transaksi,
                    'status_barang' => $request->status_barang,
                    'nama_pelanggan' => $request->nama_customer2,
                    'petugas_id' => auth()->user()->id
                ]);
            }

            if ($request->alamat_customer != null && $request->telp_customer != null) {
                Customer::create([
                    'nama_customer' => $request->nama_customer2,
                    'kategori_daerah' => $request->kategori_daerah,
                    'alamat_customer' => $request->alamat_customer,
                    'telp_customer' => $request->telp_customer,
                ]);
            }

            Barang::where('id', $request->nama_barang)->update([
                'stok_barang' => $stokBarang - $request->jumlah_transaksi
            ]);

            return redirect('transaksi')->with('success', 'Data transaksi barang keluar telah berhasil ditambahkan!');
        } else {
            $messagesPemasok = ['required' => 'Harap masukkan :attribute'];

            if ($request->alamat_pemasok == null && $request->telelpon_pemasok == null) {
                $this->validate($request, ['nama_pemasok' => 'required'], $messagesPemasok);

                Transaction::create([
                    'nama_barang' => $namaBarang,
                    'kategori_barang' => $getKategoriBarang,
                    'jumlah_transaksi' => $request->jumlah_transaksi,
                    'status_barang' => $request->status_barang,
                    'nama_pelanggan' => $request->nama_pemasok,
                    'petugas_id' => auth()->user()->id
                ]);
            } else {
                $this->validate($request, [
                    'nama_pemasok2' => 'required',
                    'alamat_pemasok' => 'required',
                    'telepon_pemasok' => 'required'
                ], $messages);

                Transaction::create([
                    'nama_barang' => $namaBarang,
                    'kategori_barang' => $getKategoriBarang,
                    'jumlah_transaksi' => $request->jumlah_transaksi,
                    'status_barang' => $request->status_barang,
                    'nama_pelanggan' => $request->nama_pemasok2,
                    'petugas_id' => auth()->user()->id
                ]);
            }

            if ($request->alamat_pemasok != null && $request->telepon_pemasok != null) {
                Supplier::create([
                    'nama_pemasok' => $request->nama_pemasok2,
                    'alamat_pemasok' => $request->alamat_pemasok,
                    'telepon_pemasok' => $request->telepon_pemasok
                ]);
            }

            Barang::where('id', $request->nama_barang)->update([
                'stok_barang' => $stokBarang + $request->jumlah_transaksi
            ]);

            return redirect('laporan/transaksi-barang')->with('success', 'Data transaksi barang masuk telah berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
