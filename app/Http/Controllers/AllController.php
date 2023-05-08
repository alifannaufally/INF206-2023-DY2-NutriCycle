<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Cart;
use App\Models\Pemanggilan;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Stringable;


class AllController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function Produk()
    {
        return view('produk', [
            'data' => Produk::get()
        ]);
    }
    public function add_cart($id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::user()->id,
            'produk_id' => $id,
        ]);

        $cart->increment('jumlah');

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
    public function keranjang()
    {
        return view('keranjang', [
            'data' => Cart::where('user_id', Auth::user()->id)->get()
        ]);
    }


}