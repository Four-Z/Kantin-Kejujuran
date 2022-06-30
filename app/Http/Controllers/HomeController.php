<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaldoKantin;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function add_product_page()
    {
        return view('add_product', [
            'title' => "Add Product"
        ]);
    }

    public function add_product(Request $req)
    {
        $this->validate($req, [
            'foto' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $foto = $req->file('foto');
        $random_name = Str::random(28);
        $foto->move(public_path('/assets/products'), $random_name);

        Product::create([
            'name' => $req->product_name,
            'price' => $req->price,
            'description' => $req->desc,
            'image_path' => $random_name,
            'student_id' => Auth::user()->student_id
        ]);

        return redirect()->route('home');
    }

    public function buy_product(Request $req)
    {

        $item = Product::find($req->product_id);
        Transaksi::create([
            'product_id' => $item->id,
            'user_id' => Auth::user()->student_id
        ]);

        $item->delete();

        return redirect()->route('home');
    }

    public function add_canteen_balance(Request $req)
    {
        $saldo_kantin = SaldoKantin::all()->first();
        $saldo_kantin->saldo += $req->amount;
        $saldo_kantin->update();

        session()->flash('message_success', 'Successfully add balance');
        return redirect()->route('canteen_balance_page');
    }

    public function withdraw_canteen_balance(Request $req)
    {
        $saldo_kantin = SaldoKantin::all()->first();
        $check = $saldo_kantin->saldo - $req->amount;

        if ($check >= 0) {
            $saldo_kantin->saldo -= $req->amount;
            $saldo_kantin->update();
            session()->flash('message_success', 'Successfully withdraw balance');
            return redirect()->route('canteen_balance_page');
        } else {
            session()->flash('message_fail', 'Canteen Balance is not enough');
            return redirect()->route('canteen_balance_page');
        }
    }
}
