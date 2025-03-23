<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;


class TopController extends Controller
{
    public function showTop()
    {
        $products = Product::with('imageFirst')->paginate(8);
        return view('customer.top',compact('products'));
    }
}
