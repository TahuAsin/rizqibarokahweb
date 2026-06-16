@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang di Panel Admin</h2>
    <p class="text-gray-500">Berikut adalah ringkasan singkat statistik website Grosir Rizqi Barokah hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
    <!-- Stat Card 1 -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Produk</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $totalProducts }}</h3>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
        <div class="w-14 h-14 bg-green-50 text-green-600 rounded-full flex items-center justify-center flex-shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Kategori</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $totalCategories }}</h3>
        </div>
    </div>
</div>

<!-- Recent Products Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-lg font-bold text-gray-900">Produk Baru Ditambahkan</h3>
        <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-medium border-b border-gray-100">Produk</th>
                    <th class="px-6 py-4 font-medium border-b border-gray-100">Kategori</th>
                    <th class="px-6 py-4 font-medium border-b border-gray-100">Tanggal Ditambahkan</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse($recentProducts as $product)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded bg-gray-100 flex items-center justify-center flex-shrink-0 border border-gray-200">
                            @if($product->image_path)
                                <img src="{{ $product->image_path }}" class="max-w-full max-h-full object-contain" alt="">
                            @else
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>
                        <span class="font-medium text-gray-900">{{ $product->name }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $product->category->name ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ $product->created_at->format('d M Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada produk yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
