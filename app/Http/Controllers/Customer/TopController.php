<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;


class TopController extends Controller
{
    public function showTop()
    {
        $products = DB::table('Products')
        ->join('images', 'Products.id', '=', 'images.id')
        ->paginate(8);
        return view('customer.top',compact('products'));
    }
}
