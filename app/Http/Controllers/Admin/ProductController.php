<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'sizes' => 'nullable|array',
            'sizes.*.size' => 'required_with:sizes|string',
            'sizes.*.price' => 'required_with:sizes|numeric',
        ]);

        $productData = [
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . time(),
            'category_id' => $validated['category_id'],
            'description' => $validated['description'] ?? null,
        ];

        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('products', 'public');
                $fullPath = '/storage/' . $path;
                $uploadedImages[] = $fullPath;
                if ($index === 0) {
                    $productData['image_path'] = $fullPath;
                }
            }
        }

        $product = Product::create($productData);

        foreach ($uploadedImages as $imagePath) {
            $product->images()->create(['image_path' => $imagePath]);
        }

        if (isset($validated['sizes'])) {
            foreach ($validated['sizes'] as $sizeData) {
                $product->productSizes()->create($sizeData);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load(['productSizes', 'images']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'sizes' => 'nullable|array',
            'sizes.*.size' => 'required_with:sizes|string',
            'sizes.*.price' => 'required_with:sizes|numeric',
        ]);

        $productData = [
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'] ?? null,
        ];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('products', 'public');
                $fullPath = '/storage/' . $path;
                
                $product->images()->create(['image_path' => $fullPath]);
                
                // If it's the first image uploaded and product currently has no image, set it as primary
                if ($index === 0 && !$product->image_path) {
                    $productData['image_path'] = $fullPath;
                }
            }
        }

        $product->update($productData);

        // Sync sizes
        $product->productSizes()->delete();
        if (isset($validated['sizes'])) {
            foreach ($validated['sizes'] as $sizeData) {
                $product->productSizes()->create($sizeData);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete all images from storage
        if ($product->image_path && strpos($product->image_path, '/storage/') === 0) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_path));
        }
        
        foreach($product->images as $img) {
            if ($img->image_path && strpos($img->image_path, '/storage/') === 0) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $img->image_path));
            }
        }

        $product->delete();
        
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function destroyImage(\App\Models\ProductImage $image)
    {
        if ($image->image_path && strpos($image->image_path, '/storage/') === 0) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $image->image_path));
        }
        
        $productId = $image->product_id;
        $image->delete();

        // If the deleted image was the primary image_path, set a new primary if available
        $product = Product::find($productId);
        if ($product && $product->image_path === $image->image_path) {
            $newPrimary = $product->images()->first();
            $product->update([
                'image_path' => $newPrimary ? $newPrimary->image_path : null
            ]);
        }

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
