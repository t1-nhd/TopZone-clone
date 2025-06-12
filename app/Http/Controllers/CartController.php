<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

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

    public function show(Request $request)
    {
        $email = Auth::user()->email;
        $customer = Customer::where('Email', $email)->first();
        $cartId = array_column($request->cartItems, 'CartId')[0];
        $productIds = array_column($request->cartItems, 'ProductId');

        $cartItems = DB::table('cart_items')
            ->join('products', 'products.ProductId', '=', 'cart_items.ProductId')
            ->where('cart_items.CartId', $cartId)
            ->get([
                'cart_items.CartId',
                'cart_items.ProductId',
                'cart_items.Quantity',
                'products.ProductName',
                'products.Memory',
                'products.UnitPrice',
                'products.Inventory',
                'products.ProductThumbnail'
            ])->toArray();
        
        $cartItems = array_filter($cartItems, function ($item) use ($productIds) {
            return in_array($item->ProductId, $productIds);
        });

        // dd($cartItems);

        return view('cart.show', [
            'cartItems' => $cartItems,
            'cartId' => $cartId,
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
        try {
            $response = [
                'message' => 'SUCCESS',
                'data' => [],
            ];

            $cartId = $request->cartId;
            $productId = $request->productId;
            $isAdd = (bool)$request->add;

            $cartItem = DB::table('cart_items')
                ->join('products', 'cart_items.ProductId', '=', 'products.ProductId')
                ->where('cart_items.CartId', $cartId)
                ->where('cart_items.ProductId', $productId)
                ->select([
                    'cart_items.ProductId',
                    'cart_items.CartId',
                    'cart_items.Quantity',
                    'products.UnitPrice',
                ])
                ->first();

            $quantity = $cartItem->Quantity;

            if ($isAdd) {
                DB::table('cart_items')
                    ->where('CartId', $cartId)
                    ->where('ProductId', $productId)
                    ->update([
                        'Quantity' => $quantity += 1
                    ]);
            } else {
                if ($quantity > 1) {
                    DB::table('cart_items')
                        ->where('CartId', $cartId)
                        ->where('ProductId', $productId
                        )->update([
                            'Quantity' => $quantity -= 1
                        ]);
                }
            }
            $cartItem->Quantity = $quantity;
            
            $response['data'] = $cartItem;
            return response()->json($response, 200);
        } catch (Exception $ex) {
            $response['message'] = $ex->getMessage();
            return response()->json($response, 400);
        }
    }

    public function removeFromCart(Request $request)
    {
        $response = [
            'message' => 'SUCCESS',
            'data' => [],
        ];
        $productId = $request->ProductId;
        $cartId = $request->CartId;

        if (!$productId || !$cartId) {
            $response['message'] = 'ProductId or CartId is missing';
            return response()->json($response, 400);
        }

        try {
            DB::table('cart_items')
                ->where([
                    'CartId' => $cartId,
                    'ProductId' => $productId
                ])->delete();

            return $response;
        } catch (Exception $ex) {
            $response['message'] = $ex->getMessage();
            return response()->json($response, 400);
        }
    }

    public function payment(Request $request)
    {
        // dd($request->all());

        $address = "Nhận tại cửa hàng";

        if($request->delivery == 'delivery'){
            $address = $request->Address;
        }

        $bill = new Bill();

        $lastBill = Bill::orderBy('BillId', 'desc')->first();
        if ($lastBill) {
            $lastNumber = (int)substr($lastBill->BillId, 3) + 1;
        } else $lastNumber = 1;
        $newBillId = "HD" . str_pad($lastNumber, 8, "0", STR_PAD_LEFT);

        $bill->BillId = $newBillId;
        $bill->CustomerId = $request->CustomerId;
        $bill->Address = $address;
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

            $newInventory = Product::findOrFail($cartItem['ProductId'])->first('Inventory')->Inventory - $cartItem['Quantity'];

            DB::table('products')->where('ProductId', $cartItem['ProductId'])->update(['Inventory' => $newInventory]);
            $cartItem = DB::table('cart_items')->where('CartId', $request->CartId)->where('ProductId', $cartItem['ProductId'])->delete();
        }
        return redirect()->route('carts.index')->with('payment-success','Thanh toán thành công');
    }
}
