<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'productSizes']);

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && is_array($request->category)) {
            $query->whereIn('category_id', $request->category);
        }

        if ($request->has('size') && is_array($request->size)) {
            $query->whereHas('productSizes', function ($q) use ($request) {
                $q->whereIn('size', $request->size);
            });
        }

        $products = $query->latest()->paginate(12);
        $categories = Category::all();
        $sizes = ['Bayi/NB', '0/XS', 'S', 'M', 'L', 'XL', 'XXL', 'L4', 'L5', 'Jumbo'];

        return view('pages.katalog', compact('products', 'categories', 'sizes'));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'productSizes'])->where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('product'));
    }
}
