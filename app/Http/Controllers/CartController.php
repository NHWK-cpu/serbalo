<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request) {
        if (!$request) {
            return back();
        }

        if (Auth::guest()) {
            return redirect('/login')->with('message', 'silahkan login terlebih dahulu untuk memasukkan ke keranjang');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        
        ]);

        $cart = User::find(Auth::user()->id)->cart ?? Cart::create(['user_id' => Auth::user()->id]);

        $cartItem = $cart->items()->where('product_id', $request->productId)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $request->quantity]);
        } else {
            $cart->items()->create([
                'product_id' => $request->products_id,
                'quantity' => $request->quantity,
            ]);
        }

        return back()->with('message', 'Barang berhasil dimasukkan ke keranjang');
    }

    public function show_cart() {
        $cart = Auth::user()->cart;
        $item = CartItem::where('cart_id',$cart->id)->get();
        $total = 0;
        foreach ($item as $i) {
            $total += Product::find($i['product_id'])->price * $i->quantity;
        }

        return view('cart', ['items' => $item, 'total' => $total]);
    }

    public function delete_item($id) {
        CartItem::find($id)->delete();
        return back();
    }
}
