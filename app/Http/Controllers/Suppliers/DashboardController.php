<?php

namespace App\Http\Controllers\Suppliers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('supplier.dashboard');
    }

    public function product()
    {
        $user = Auth::user();
        $data = Product::where('supplier_id','=',$user->id)->get();
        return view('supplier.product.index',compact('data'));
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
