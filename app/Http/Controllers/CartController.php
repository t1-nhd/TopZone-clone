<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\CartItem;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($customerId)
    {
        $cart = Cart::where('CustomerId', $customerId);
        $cartItems = CartItem::where('CartId', $cart->CartId);
        return view('carts.index',[
            'cartItems' => $cartItems,
        ]);
    }
}
