<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Staff;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PenjualanStaff;
use App\Models\PenjualanBarang;

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
        // $stocks = Stock::get();
        // $penjualans = PenjualanBarang::get();
        // $pembelians = Pembelian::get();
        // $penjualanStaff = PenjualanStaff::get();
        // $staffs = Staff::get();
        // $customers = Customer::get();
        // $absensis = Absence::get();
        return view('dashboard');
    }
}
