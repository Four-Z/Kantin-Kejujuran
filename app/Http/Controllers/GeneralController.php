<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaldoKantin;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $all_product = Product::all();
        return view('home', [
            'title' => "Kantin Kejujuran",
            'products' => $all_product
        ]);
    }

    public function index_sortByDate()
    {
        $all_product = Product::orderBy('created_at', 'DESC')->get();
        return view('home', [
            'title' => "Kantin Kejujuran",
            'products' => $all_product
        ]);
    }

    public function index_sortByName()
    {
        $all_product = Product::orderBy('name', 'ASC')->get();
        return view('home', [
            'title' => "Kantin Kejujuran",
            'products' => $all_product
        ]);
    }

    public function canteen_balance_page()
    {
        $saldo_kantin = SaldoKantin::all()->first();
        return view('canteen_balance', [
            'title' => "Canteen's Balance",
            'saldo' => $saldo_kantin->saldo
        ]);
    }
}
