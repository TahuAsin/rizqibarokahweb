@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<!-- Header Banner -->
<div class="bg-gradient-to-r from-[#1b3b22] to-[#2c5c35] px-6 py-8 md:px-8 md:py-8 rounded-2xl shadow-lg mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
    <div>
        <h2 class="text-2xl font-bold text-white mb-2 font-serif tracking-wide flex items-center gap-2">
            <svg class="w-7 h-7 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            Manajemen Kategori
        </h2>
        <p class="text-[#faeed4] text-sm md:text-base opacity-90">Kelola kategori untuk mengelompokkan produk Anda secara rapi.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="bg-[#b8860b] hover:bg-[#a0750a] text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 shadow-md flex items-center gap-2 transform hover:-translate-y-1 w-full md:w-auto justify-center">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    
    <!-- DESKTOP VIEW: Table (Hidden on mobile) -->
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/80 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <th class="px-8 py-5 font-bold w-16 text-center">No</th>
                    <th class="px-8 py-5 font-bold">Nama Kategori</th>
                    <th class="px-8 py-5 font-bold text-center">Jumlah Produk</th>
                    <th class="px-8 py-5 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse($categories as $index => $category)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-8 py-4 text-gray-400 text-center font-medium">{{ $categories->firstItem() + $index }}</td>
                    <td class="px-8 py-4">
                        <span class="font-bold text-gray-900 text-base">{{ $category->name }}</span>
                    </td>
                    <td class="px-8 py-4 text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold border {{ $category->products_count > 0 ? 'bg-[#eefaf2] text-[#1b3b22] border-[#1b3b22]/20' : 'bg-gray-50 text-gray-500 border-gray-200' }}">
                            {{ $category->products_count }} Produk
                        </span>
                    </td>
                    <td class="px-8 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="p-2 text-[#1b3b22] hover:bg-[#faeed4] rounded-lg transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? PERHATIAN: Semua produk yang ada di dalam kategori ini JUGA AKAN IKUT TERHAPUS. Tindakan ini tidak dapat dibatalkan.');">
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
                    <td colspan="4" class="px-8 py-16 text-center">
                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Belum Ada Kategori</h3>
                        <p class="text-gray-500 mb-6 text-sm">Mulai dengan menambahkan kategori pertama Anda.</p>
                        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center text-[#b8860b] font-bold hover:underline">
                            Tambah Kategori Sekarang
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- MOBILE VIEW: Cards (Visible only on mobile) -->
    <div class="md:hidden divide-y divide-gray-100">
        @forelse($categories as $category)
        <div class="p-5 hover:bg-gray-50 transition">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="font-bold text-gray-900 leading-tight mb-1 text-base">{{ $category->name }}</h3>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold border {{ $category->products_count > 0 ? 'bg-[#eefaf2] text-[#1b3b22] border-[#1b3b22]/20' : 'bg-gray-50 text-gray-500 border-gray-200' }}">
                        {{ $category->products_count }} Produk
                    </span>
                </div>
            </div>
            <!-- Actions -->
            <div class="flex gap-2">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-gray-100 text-[#1b3b22] rounded-lg text-xs font-bold hover:bg-gray-200 transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit
                </a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-1 px-3 py-2 bg-red-50 text-red-600 rounded-lg text-xs font-bold hover:bg-red-100 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="p-8 text-center">
            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            </div>
            <h3 class="text-base font-bold text-gray-800 mb-1">Belum Ada Kategori</h3>
            <p class="text-gray-500 mb-4 text-xs">Mulai dengan menambahkan kategori pertama.</p>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-[#b8860b] text-white rounded-lg text-xs font-bold">
                Tambah Kategori
            </a>
        </div>
        @endforelse
    </div>

    @if($categories->hasPages())
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $categories->links() }}
    </div>
    @endif
</div>
@endsection
