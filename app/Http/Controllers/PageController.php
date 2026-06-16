<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $latestProducts = Product::with(['productSizes'])->latest()->take(4)->get();
        return view('pages.home', compact('latestProducts'));
    }

    public function panduanUkuran()
    {
        return view('pages.panduan-ukuran');
    }

    public function caraPemesanan()
    {
        return view('pages.cara-pemesanan');
    }

    public function kontak()
    {
        $contact = \App\Models\Contact::first();
        return view('pages.kontak', compact('contact'));
    }
}
