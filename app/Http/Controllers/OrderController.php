<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order_status() {
        if (Auth::guest()) {
            return redirect('/login')->with(['message' => 'silahkan login terlebih dahulu untuk melakukan order']);
        }

        $order = Order::where('user_id', Auth::user()->id)->get();
        return view('order_status', ['orders' => $order]);
    }

    public function add_order(Request $request) {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if (Auth::guest()) {
            return redirect('/login')->with(['message' => 'silahkan login terlebih dahulu untuk melakukan order']);
        }
        $item = Product::find($request->products_id);
        if ($item) {
            $total_price = $item['price'] * $request->quantity;
            return view('order', ['item' => $item, 'quantity' => $request->quantity, 'total_price' => $total_price]);
        }
        return back()->with('message', 'error pesanan tidak ditemukan');
    }

    public function order(Request $request) {
        $user = User::find(Auth::user()->id);
        $order = $user->orders()->create(['total' => $request->total_price, 'status' => 'pending']);
        $item = Product::find($request->item_id);
        $order->orderItems()->create(['product_id' => $item->id,'quantity' => $request->quantity,'price' => $item->price]);
        $item->update(['stock' => $item->stock - $request->quantity]);
        return redirect('/')->with('message','Pesanan anda berhasil dibuat!');
    }

    public function cart_order(Request $request) {
        if (Auth::guest()) {
            return redirect('/login')->with(['message' => 'silahkan login terlebih dahulu untuk melakukan order']);
        }

        $cart = Cart::find($request->cart_id);
        $items = CartItem::where('cart_id', $cart->id)->get();

        $total_price = 0;
        foreach ($items as $item) {
            $product = Product::find($item->product_id);
            $total_price += $product['price'] * $item->quantity;
        }
        return view('order_cart', ['items' => $items, 'total_price' => $total_price, 'cart' => $cart->id]);
    }

    public function cart_checkout(Request $request) {
        if (Auth::guest()) {
            return redirect('/login')->with(['message' => 'silahkan login terlebih dahulu untuk melakukan order']);
        }

        $items = CartItem::where('cart_id', $request->cart_id)->get();

        $user = User::find(Auth::user()->id);
        $order = $user->orders()->create(['total' => $request->total_price, 'status' => 'pending']);
        foreach ($items as $item) {
            $product = Product::find($item->product_id);
            $order->orderItems()->create(['product_id' => $item->product_id, 'quantity' => $item->quantity, 'price' => $product->price * $item->quantity]);
            $product->update(['stock' => $product->stock - $item->quantity]);
            CartItem::destroy($item->id);
        }
        return redirect('/')->with('message','Pesanan anda berhasil dibuat!');
    }
}
