<?php

namespace App\Services;
use App\Models\Product;
use App\Models\Cart;

class CartService
{
  public static function getItemsInCart($items)
  {
    $products = [];

    foreach($items as $item)
    {
        $p = Product::findOrFail($item->product_id);
        $shop = $p->shop;
        $shopInfo = [
          'shopName' => $shop->name,
          'information' => $shop->information
        ];

        $product = Product::where('id', $item->product_id)
        ->select('id', 'name', 'price')->get()->toArray();
  
        $quantity = Cart::where('product_id', $item->product_id)
        ->select('quantity')->get()->toArray();

        $result = array_merge($product[0], $shopInfo, $quantity[0]);
        
        array_push($products, $result);
    }
  
    return $products;

  }
}