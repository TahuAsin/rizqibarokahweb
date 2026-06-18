@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Header Banner -->
<div class="bg-gradient-to-r from-[#1b3b22] to-[#2c5c35] px-8 py-10 rounded-2xl shadow-lg mb-8 relative overflow-hidden">
    <!-- Decorative Circle -->
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-64 h-64 rounded-full bg-white opacity-5"></div>
    
    <div class="relative z-10">
        <h2 class="text-3xl font-bold text-white mb-2 font-serif tracking-wide">Selamat Datang di Panel Admin</h2>
        <p class="text-[#faeed4] opacity-90 text-lg">Berikut adalah ringkasan singkat statistik website Grosir Rizqi Barokah hari ini.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
    <!-- Stat Card 1 -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-5 hover:shadow-md transition duration-300 group">
        <div class="w-16 h-16 bg-[#faeed4] text-[#b8860b] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition duration-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500 mb-1 uppercase tracking-wider">Total Produk</p>
            <h3 class="text-3xl font-black text-gray-900">{{ $totalProducts }}</h3>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-5 hover:shadow-md transition duration-300 group">
        <div class="w-16 h-16 bg-[#eefaf2] text-[#1b3b22] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition duration-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
        </div>
        <div>
            <p class="text-sm font-bold text-gray-500 mb-1 uppercase tracking-wider">Total Kategori</p>
            <h3 class="text-3xl font-black text-gray-900">{{ $totalCategories }}</h3>
        </div>
    </div>
</div>

<!-- Recent Products Table -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between sm:items-center gap-4 bg-gray-50/50">
        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Produk Baru Ditambahkan
        </h3>
        <a href="{{ route('admin.products.index') }}" class="text-sm font-bold text-[#1b3b22] hover:text-[#b8860b] transition flex items-center gap-1">
            Lihat Semua Katalog
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>
    
    <!-- DESKTOP VIEW -->
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white text-gray-400 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-8 py-5 font-bold">Produk</th>
                    <th class="px-8 py-5 font-bold">Kategori</th>
                    <th class="px-8 py-5 font-bold text-right">Tanggal Ditambahkan</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse($recentProducts as $product)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-8 py-4 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center flex-shrink-0 border border-gray-100 p-1 shadow-sm">
                            @if($product->image_path)
                                <img src="{{ $product->image_path }}" class="max-w-full max-h-full object-contain rounded-lg" alt="">
                            @else
                                <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>
                        <span class="font-bold text-gray-900 text-base">{{ $product->name }}</span>
                    </td>
                    <td class="px-8 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-[#faeed4] text-[#1b3b22]">
                            {{ $product->category->name ?? '-' }}
                        </span>
                    </td>
                    <td class="px-8 py-4 text-right text-gray-500 font-medium">
                        {{ $product->created_at->format('d M Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-8 py-12 text-center">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <p class="text-gray-500 font-medium">Belum ada produk yang ditambahkan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- MOBILE VIEW -->
    <div class="md:hidden divide-y divide-gray-100">
        @forelse($recentProducts as $product)
        <div class="p-5 hover:bg-gray-50 transition">
            <div class="flex gap-4">
                <div class="w-16 h-16 rounded-xl bg-white flex items-center justify-center flex-shrink-0 border border-gray-100 p-1 shadow-sm">
                    @if($product->image_path)
                        <img src="{{ $product->image_path }}" class="max-w-full max-h-full object-contain rounded-lg" alt="">
                    @else
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    @endif
                </div>
                <div class="flex-grow">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-[#faeed4] text-[#1b3b22] mb-1">
                        {{ $product->category->name ?? '-' }}
                    </span>
                    <h3 class="font-bold text-gray-900 leading-tight mb-1 text-sm">{{ $product->name }}</h3>
                    <span class="text-xs text-gray-400 font-medium">{{ $product->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="p-6 text-center text-sm text-gray-500">Belum ada produk.</div>
        @endforelse
    </div>
</div>
@endsection
