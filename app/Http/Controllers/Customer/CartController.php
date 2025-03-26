<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;
use App\Jobs\SendThanksMail;
use App\Jobs\SendOrderedMail;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use App\Models\Admin;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        $totalPrice = 0;

        foreach($products as $product){
            $totalPrice += $product->price * $product->pivot->quantity;
        }

        return view('customer.cart', 
            compact('products', 'totalPrice'));
    }
    
    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $itemInCart = Cart::where('product_id', $request->product_id)
        ->where('user_id', Auth::id())->first();

        if($itemInCart){
            $itemInCart->quantity += $request->quantity;
            $itemInCart->save();

        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function update(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->firstOrFail();

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->route('cart.index');
    }

    public function delete($productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();

        return redirect()->route('cart.index');
    }

    public function remove($item)
    {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    Cart::where('user_id', Auth::id())
        ->where('product_id', $item)
        ->delete();

    return redirect()->route('cart.index')
    ->with(['message' => '商品を削除しました。',
        'status' => 'alert']);
    }

    public function checkout()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        
        $lineItems = [];
        foreach($products as $product){
            $quantity = '';
            $quantity = Stock::where('product_id', $product->id)->sum('quantity');

            if($product->pivot->quantity > $quantity){
                return redirect()->route('cart.index');
            } else {
                $lineItem = [
                    'price_data' => [
                        'unit_amount' => $product->price,
                        'currency' => 'JPY',
                        'product_data' => [
                            'name' => $product->name,
                            'description' => $product->information,
                        ],
                    ],
                    'quantity' => $product->pivot->quantity,
                ];
                array_push($lineItems, $lineItem);    
            }
        }
        foreach($products as $product){
            Stock::create([
                'product_id' => $product->id,
                'type' => \App\Constants\Common::PRODUCT_LIST['reduce'],
                'quantity' => $product->pivot->quantity * -1
            ]);
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('cart.success'),
            'cancel_url' => route('cart.cancel'),
        ]);

        $publicKey = env('STRIPE_PUBLIC_KEY');

        return view('customer.checkout', 
            compact('session', 'publicKey'));
    }

    public function success()
    {
        $items = Cart::where('user_id', Auth::id())->get();
        $products = CartService::getItemsInCart($items);
        $user = User::findOrFail(Auth::id());
        $admin1 = Admin::findOrFail(1);
        $admin2 = Admin::findOrFail(2);

        SendThanksMail::dispatch($products, $user);
        foreach($products as $product)
        {
            SendOrderedMail::dispatch($product, $user, $admin1, $admin2);
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('top')
        ->with(['message' => '支払いが完了しました。',
        'status' => 'info']);
    }

    public function cancel()
    {
        $user = User::findOrFail(Auth::id());

        foreach($user->products as $product){
            Stock::create([
                'product_id' => $product->id,
                'type' => \App\Constants\Common::PRODUCT_LIST['add'],
                'quantity' => $product->pivot->quantity
            ]);
        }

        return redirect()->route('cart.index');
    }
}
