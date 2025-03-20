<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; 
use App\Models\Product;
use App\Models\Stock;
use App\Models\Shop;
use App\Models\PrimaryCategory;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('product'); 
            if(!is_null($id)){
                if(!is_null($id)){ 
                    $product = Product::findOrFail($id);
                } 
            }
            return $next($request);
        });
    }
    
     public function index()
    {
        // EagerLoadingなし
        //$products = Owner::findOrFail(Auth::id())->shop->product;
        $shopInfo = Shop::with('product.imageFirst')->get();

        return view('admin.products.index',
        compact('shopInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = Shop::select('id', 'name')->get();

        $images = Image::select('id', 'title', 'filename')
        ->orderBy('updated_at', 'desc')
        ->get();

        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('admin.products.create', 
            compact('shops', 'images', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::transaction(function () use($request) {
                $product = Product::create([
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'sort_order' => $request->sort_order,
                    'shop_id' => $request->shop_id,
                    'secondary_category_id' => $request->category,
                    'image1' => $request->image1,
                    'image2' => $request->image2,
                    'image3' => $request->image3,
                    'image4' => $request->image4,
                    'is_selling' => $request->is_selling,
                    'is_soldout' => false, // 仮置きの値のため、フォームのレイアウトと合わせて後ほど修正する。
                    'color' => 'default_color' // 仮置きの値のため、フォームのレイアウトと合わせて後ほど修正する。

                ]);

                Stock::create([
                    'product_id' => $product->id,
                    'type' => 1,
                    'quantity' => $request->quantity
                ]);
            }, 2);
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        return redirect()
        ->route('admin.products.index')
        ->with(['message' => '商品登録しました。',
        'status' => 'info']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
        ->sum('quantity');

        $shops = Shop::select('id', 'name')
        ->get();

        $images = Image::select('id', 'title', 'filename')
        ->orderBy('updated_at', 'desc')
        ->get();

        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('admin.products.edit',
            compact('product', 'quantity', 'shops', 
            'images', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
