<?php

namespace App\Http\Controllers\Suppliers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('supplier.dashboard');
    }

    public function product()
    {
        return view('supplier.product.index');
    }

    public function orders()
    {
        return view('supplier.order.index');
    }

    public function transactionHistory()
    {
        return view('supplier.history.index');
    }

    public function withdraw()
    {
        return view('supplier.withdraw.index');
    }

    public function profile()
    {
        return view('supplier.profile.index');
    }
}
