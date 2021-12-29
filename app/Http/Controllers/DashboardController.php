<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::user()->role == 'admin') {
            $supplier = count(Supplier::get()->toArray());
            $pengguna = count(User::get()->toArray());
            $data = [$category, $barang, $supplier, $pengguna];
        } else {
            $customer = count(Customer::get()->toArray());
            $data = [$category, $barang, $customer];
        }

        return view('dashboard', compact('data'));
    }
}
