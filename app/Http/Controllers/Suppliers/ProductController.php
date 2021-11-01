<?php

namespace App\Http\Controllers\Suppliers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function create()
    {
        return view('supplier.product.create');
    }
}
