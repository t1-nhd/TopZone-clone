<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Auth::user()->email;
        $customer = Customer::where('Email', $email)->first('CustomerId');
        $cart = Cart::where('CustomerId', $customer->CustomerId)->first('CartId');
        $cartItems = DB::table('cart_items')
            ->join('products', 'products.ProductId', '=', 'cart_items.ProductId')
            ->where('CartId', $cart->CartId)
            ->get();

        return view('cart.index', [
            'cartItems' => $cartItems,
        ]);
    }

    public function addToCart(Request $request)
    {
        $email = Auth::user()->email;
        $productId = $request->ProductId;
        $customer = Customer::where('Email', $email)->first('CustomerId');
        $cart = Cart::where('CustomerId', $customer->CustomerId)->first('CartId')->CartId;

        $cartItem = DB::table('cart_items')->where('CartId', $cart)->where('ProductId', $productId)->first();

        if ($cartItem) {
            $quantity = $cartItem->Quantity + $request->Quantity;
            DB::table('cart_items')->where('CartId', $cart)->where('ProductId', $productId)->update([
                'Quantity' => $quantity
            ]);
            return redirect()->back()->with('update-cart-successfully', 'Cập nhật giỏ hàng thành công');
        } else {
            DB::table('cart_items')->insert([
                'CartId' => $cart,
                'ProductId' => $productId,
                'Quantity' => $request->Quantity,
            ]);

            return redirect()->route('carts.index')->with('add-to-cart-successfully', 'Thêm vào giỏ hàng thành công');
        }
    }
    public function update(Request $request)
    {
        $email = Auth::user()->email;
        $productId = $request->ProductId;
        $customer = Customer::where('Email', $email)->first('CustomerId');
        $cart = Cart::where('CustomerId', $customer->CustomerId)->first('CartId')->CartId;

        $cartItem = DB::table('cart_items')->where('CartId', $cart)->where('ProductId', $productId)->first();
        $quantity = $cartItem->Quantity;

        if ($request->update == 'decrement') {
            if($quantity <= 1){
                DB::table('cart_items')->where('CartId', $cart)->where('ProductId', $productId)->delete();
                return redirect()->route('carts.index');
            }
            DB::table('cart_items')->where('CartId', $cart)->where('ProductId', $productId)->update([
                'Quantity' => $quantity -= 1
            ]);
        }
        if ($request->update == 'increment') {
            DB::table('cart_items')->where('CartId', $cart)->where('ProductId', $productId)->update([
                'Quantity' => $quantity += 1
            ]);
        }
        return redirect()->route('carts.index');
    }

    public function removeFromCart(Request $request)
    {
        $email = Auth::user()->email;
        $productId = $request->ProductId;
        $customer = Customer::where('Email', $email)->first('CustomerId');
        $cart = Cart::where('CustomerId', $customer->CustomerId)->first('CartId')->CartId;

        DB::table('cart_items')->where('CartId', $cart)->where('ProductId',$productId)->delete();
        
        return redirect()->route('carts.index');
    }
}
