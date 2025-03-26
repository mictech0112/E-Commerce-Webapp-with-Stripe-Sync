<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use App\Models\SecondaryCategory;
use App\Models\PrimaryCategory;

class TopController extends Controller
{
    public function showTop()
    {
        $products = Product::with('imageFirst')
        ->where('is_selling', true)
        ->paginate(8);
        return view('customer.top',compact('products'));
    }

    public function showDetail($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        if($quantity > 9){
            $quantity = 9;
        }

        $secondaryCategory = SecondaryCategory::findOrFail($product->secondary_category_id);
        $primaryCategory = PrimaryCategory::findOrFail($secondaryCategory->primary_category_id);

        return view('customer.detail', 
        compact('product', 'quantity','secondaryCategory','primaryCategory'));
    }
}
