<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\CartItem;
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

    public function show()
    {
        $email = Auth::user()->email;
        $customer = Customer::where('Email', $email)->first();
        $cart = Cart::where('CustomerId', $customer->CustomerId)->first();
        $cartItems = DB::table('cart_items')
            ->join('products', 'products.ProductId', '=', 'cart_items.ProductId')
            ->where('CartId', $cart->CartId)
            ->get();
        return view('cart.show', [
            'cartItems' => $cartItems,
            'customer' => $customer,
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
            if ($quantity <= 1) {
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

        DB::table('cart_items')->where('CartId', $cart)->where('ProductId', $productId)->delete();

        return redirect()->route('carts.index');
    }

    public function payment(Request $request)
    {
        // dd($request->all());
        $bill = new Bill();

        $lastBill = Bill::orderBy('BillId', 'desc')->first();
        if ($lastBill) {
            $lastNumber = (int)substr($lastBill->BillId, 3) + 1;
        } else $lastNumber = 1;
        $newBillId = "HD" . str_pad($lastNumber, 8, "0", STR_PAD_LEFT);

        $bill->BillId = $newBillId;
        $bill->CustomerId = $request->CustomerId;
        $bill->Address = $request->Address;
        $bill->Note = $request->Note;
        $bill->Phone = $request->Phone;
        $bill->TotalBill = $request->TotalBill;
        $bill->save();

        foreach($request->cartItems as $cartItem){
            // dd($cartItem);
            DB::table('bill_details')->insert([
                'BillId' => $newBillId, 
                'ProductId' => $cartItem['ProductId'],
                'Quantity' => $cartItem['Quantity'],
            ]);
            $cartItem = DB::table('cart_items')->where('CartId', $request->CartId)->where('ProductId', $cartItem['ProductId'])->delete();
        }
        $billDetails = DB::table('bill_details')->where('BillId', $newBillId)->get();
        return redirect()->route('carts.index')->with('payment-success','Thanh toán thành công');
    }
}
