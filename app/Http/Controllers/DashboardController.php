<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        $category = count(Category::get()->toArray());
        $barang = count(Barang::get()->toArray());
        $supplier = count(Supplier::get()->toArray());
        $pengguna = count(User::get()->toArray());
        $data = [$category, $barang, $supplier, $pengguna];
        return view('dashboard', compact('data'));
    }
}
