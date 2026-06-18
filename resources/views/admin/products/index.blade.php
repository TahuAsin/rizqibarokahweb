@extends('layouts.admin')

@section('title', 'Manajemen Katalog')

@section('content')
<!-- Header Banner -->
<div class="bg-gradient-to-r from-[#1b3b22] to-[#2c5c35] px-6 py-8 md:px-8 md:py-8 rounded-2xl shadow-lg mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
    <div>
        <h2 class="text-2xl font-bold text-white mb-2 font-serif tracking-wide flex items-center gap-2">
            <svg class="w-7 h-7 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            Daftar Katalog Produk
        </h2>
        <p class="text-[#faeed4] text-sm md:text-base opacity-90">Kelola koleksi pakaian yang ditampilkan di website publik Anda.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="bg-[#b8860b] hover:bg-[#a0750a] text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 shadow-md flex items-center gap-2 transform hover:-translate-y-1 w-full md:w-auto justify-center">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Baru
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    
    <!-- DESKTOP VIEW: Table (Hidden on mobile) -->
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/80 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-6 py-5 font-bold w-16 text-center">No</th>
                    <th class="px-6 py-5 font-bold">Produk</th>
                    <th class="px-6 py-5 font-bold">Kategori</th>
                    <th class="px-6 py-5 font-bold text-center">Varian & Harga</th>
                    <th class="px-6 py-5 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse($products as $index => $product)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4 text-gray-400 text-center font-medium">{{ $products->firstItem() + $index }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl bg-gray-50 flex items-center justify-center flex-shrink-0 border border-gray-200 p-1 shadow-sm">
                                @if($product->image_path)
                                    <img src="{{ $product->image_path }}" class="max-w-full max-h-full object-contain rounded-lg" alt="{{ $product->name }}">
                                @else
                                    <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                @endif
                            </div>
                            <div>
                                <span class="font-bold text-gray-900 block mb-1 text-base">{{ $product->name }}</span>
                                <a href="{{ route('katalog.show', $product->slug) }}" target="_blank" class="text-xs text-blue-600 hover:text-[#b8860b] hover:underline flex items-center gap-1">
                                    Lihat di Web
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-[#faeed4] text-[#1b3b22]">
                            {{ $product->category->name ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex flex-col items-center">
                            <span class="text-gray-800 font-bold bg-gray-100 px-3 py-1 rounded-lg text-xs border border-gray-200">
                                {{ $product->productSizes->count() }} Variasi
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="p-2 text-[#1b3b22] hover:bg-[#faeed4] rounded-lg transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center">
                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Belum Ada Produk</h3>
                        <p class="text-gray-500 mb-6 text-sm">Katalog Anda masih kosong. Yuk mulai tambahkan produk pertama Anda!</p>
                        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center text-[#b8860b] font-bold hover:underline">
                            Tambah Produk Sekarang
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- MOBILE VIEW: Cards (Visible only on mobile) -->
    <div class="md:hidden divide-y divide-gray-100">
        @forelse($products as $product)
        <div class="p-5 hover:bg-gray-50 transition">
            <div class="flex gap-4 mb-4">
                <!-- Image -->
                <div class="w-20 h-20 rounded-xl bg-gray-50 flex items-center justify-center flex-shrink-0 border border-gray-200 p-1">
                    @if($product->image_path)
                        <img src="{{ $product->image_path }}" class="max-w-full max-h-full object-contain rounded-lg" alt="{{ $product->name }}">
                    @else
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    @endif
                </div>
                <!-- Info -->
                <div class="flex-grow">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-[#faeed4] text-[#1b3b22] mb-1">
                        {{ $product->category->name ?? '-' }}
                    </span>
                    <h3 class="font-bold text-gray-900 leading-tight mb-1 text-sm">{{ $product->name }}</h3>
                    <span class="text-xs text-gray-500 font-medium">{{ $product->productSizes->count() }} Variasi Harga</span>
                </div>
            </div>
            <!-- Actions -->
            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                <a href="{{ route('katalog.show', $product->slug) }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Lihat Web
                </a>
                <div class="flex gap-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="flex items-center gap-1 px-3 py-1.5 bg-gray-100 text-[#1b3b22] rounded-lg text-xs font-bold hover:bg-gray-200 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center gap-1 px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-bold hover:bg-red-100 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="p-8 text-center">
            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </div>
            <h3 class="text-base font-bold text-gray-800 mb-1">Belum Ada Produk</h3>
            <p class="text-gray-500 mb-4 text-xs">Katalog Anda masih kosong.</p>
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-4 py-2 bg-[#b8860b] text-white rounded-lg text-xs font-bold">
                Tambah Produk
            </a>
        </div>
        @endforelse
    </div>

    @if($products->hasPages())
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection
