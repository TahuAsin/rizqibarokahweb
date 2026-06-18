@extends('layouts.app')

@section('content')
<div class="bg-[#fdfbf7] min-h-screen">
    <!-- Header Section -->
    <div class="bg-[#1b3b22] py-16 relative overflow-hidden">
        <!-- Batik subtle overlay -->
        <div class="absolute inset-0 opacity-[0.05] pointer-events-none" style="background-image: radial-gradient(circle at center, #b8860b 2px, transparent 2.5px); background-size: 24px 24px;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-[#b8860b] font-serif mb-4">Katalog Produk</h1>
            <p class="text-[#faeed4] text-lg max-w-2xl mx-auto">Temukan koleksi lengkap pakaian tradisional Jawa berkualitas tinggi untuk segala kebutuhan acara Anda.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Sidebar -->
            <div class="w-full lg:w-1/4 flex-shrink-0">
                <div class="bg-white p-6 border-2 border-[#1b3b22]/10 rounded-lg shadow-sm sticky top-28">
                    <h2 class="text-2xl font-bold text-[#1b3b22] mb-6 font-serif border-b-2 border-[#b8860b] pb-2 inline-block">Saringan</h2>
                    
                    <form action="{{ route('katalog.index') }}" method="GET" class="mb-8">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        
                        <!-- Kategori -->
                        <div class="mb-8">
                            <h3 class="font-bold text-[#b8860b] mb-4 uppercase tracking-wider text-sm flex items-center gap-2">
                                <div class="w-2 h-2 rotate-45 bg-[#b8860b]"></div> Kategori
                            </h3>
                            <div class="space-y-3 text-sm text-gray-700">
                                @foreach($categories as $category)
                                    <label class="flex items-center group cursor-pointer hover:bg-[#faeed4]/50 p-1.5 rounded transition">
                                        <input type="checkbox" name="category[]" value="{{ $category->id }}" class="rounded border-gray-300 text-[#1b3b22] shadow-sm focus:border-[#b8860b] focus:ring focus:ring-[#b8860b] focus:ring-opacity-50" {{ in_array($category->id, (array) request('category', [])) ? 'checked' : '' }} onchange="this.form.submit()">
                                        <span class="ml-3 group-hover:text-[#1b3b22] group-hover:font-bold transition">{{ $category->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Ukuran -->
                        <div>
                            <h3 class="font-bold text-[#b8860b] mb-4 uppercase tracking-wider text-sm flex items-center gap-2">
                                <div class="w-2 h-2 rotate-45 bg-[#b8860b]"></div> Ukuran
                            </h3>
                            <div class="grid grid-cols-2 gap-2 text-sm text-gray-700">
                                @foreach($sizes as $size)
                                    <label class="flex items-center justify-center border border-gray-200 rounded p-2 cursor-pointer hover:border-[#b8860b] hover:bg-[#faeed4] transition {{ in_array($size, (array) request('size', [])) ? 'bg-[#1b3b22] text-white border-[#1b3b22]' : '' }}">
                                        <input type="checkbox" name="size[]" value="{{ $size }}" class="sr-only" {{ in_array($size, (array) request('size', [])) ? 'checked' : '' }} onchange="this.form.submit()">
                                        <span class="font-medium">{{ $size }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </form>

                    <!-- Top Rated Products -->
                    <div class="mt-12 hidden lg:block">
                        <h3 class="text-xl font-bold text-[#1b3b22] mb-6 font-serif border-b-2 border-[#b8860b] pb-2 inline-block">Produk Terbaru</h3>
                        <div class="space-y-4">
                            @foreach($latestProducts as $topProduct)
                            <div class="flex items-center gap-4 group cursor-pointer bg-white border border-transparent hover:border-[#b8860b]/50 p-2 rounded transition" onclick="window.location='{{ route('katalog.show', $topProduct->slug) }}'">
                                <div class="w-16 h-16 bg-[#fdfbf7] border border-[#1b3b22]/10 flex-shrink-0 flex items-center justify-center p-1">
                                    <img src="{{ $topProduct->image_path ?: 'https://via.placeholder.com/150' }}" class="max-w-full max-h-full object-contain mix-blend-multiply group-hover:scale-110 transition duration-300 drop-shadow-sm">
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#1b3b22] group-hover:text-[#b8860b] transition line-clamp-1 mb-1 font-serif">{{ $topProduct->name }}</h4>
                                    <div class="text-xs font-bold text-gray-900">
                                        Rp{{ number_format($topProduct->productSizes->min('price') ?? 0, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Promo Banner -->
                    <div class="mt-12 bg-[#1b3b22] text-[#fdfbf7] p-6 rounded-lg relative overflow-hidden hidden lg:block border-b-4 border-[#b8860b]">
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold mb-4 font-serif tracking-tight leading-tight text-[#b8860b]">Kualitas<br>Keraton</h3>
                            <p class="text-sm mb-4 leading-relaxed opacity-90">
                                Dapatkan harga khusus untuk pemesanan partai besar. Kualitas jahitan rapi, motif autentik.
                            </p>
                            <a href="{{ route('kontak') }}" class="inline-block border border-[#b8860b] text-[#b8860b] hover:bg-[#b8860b] hover:text-[#1b3b22] text-xs font-bold py-2 px-4 uppercase tracking-wider transition">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Product Grid -->
            <div class="w-full lg:w-3/4">
                @if(request('search'))
                    <div class="mb-8 pb-4 border-b border-[#b8860b]/30 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                        <div>
                            <span class="text-gray-500 text-sm">Menampilkan hasil untuk:</span>
                            <strong class="text-[#1b3b22] text-lg ml-2 font-serif font-bold italic">"{{ request('search') }}"</strong>
                        </div>
                        <a href="{{ route('katalog.index') }}" class="text-sm text-red-600 hover:text-red-800 hover:underline flex items-center gap-1 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Hapus
                        </a>
                    </div>
                @endif

                @if($products->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                        @foreach($products as $product)
                        <div class="group flex flex-col h-full bg-white border border-[#1b3b22]/10 rounded-lg overflow-hidden hover:shadow-xl transition duration-300 hover:border-[#b8860b]/50">
                            <!-- Image Container -->
                            <div class="bg-[#fdfbf7] aspect-w-1 aspect-h-1 relative flex items-center justify-center p-3 sm:p-6 h-[160px] sm:h-[260px] border-b border-[#1b3b22]/5">
                                <a href="{{ route('katalog.show', $product->slug) }}" class="block w-full h-full flex items-center justify-center relative">
                                    <!-- Decorative corner -->
                                    <div class="absolute top-0 left-0 w-4 h-4 sm:w-8 sm:h-8 border-t-2 border-l-2 border-[#b8860b] opacity-0 group-hover:opacity-100 transition duration-500"></div>
                                    <div class="absolute bottom-0 right-0 w-4 h-4 sm:w-8 sm:h-8 border-b-2 border-r-2 border-[#b8860b] opacity-0 group-hover:opacity-100 transition duration-500"></div>
                                    
                                    <img src="{{ $product->image_path ?: 'https://via.placeholder.com/400' }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain mix-blend-multiply group-hover:scale-110 transition duration-500 drop-shadow-md">
                                </a>
                            </div>
                            
                            <!-- Info Container -->
                            <div class="flex flex-col flex-grow text-center p-2 sm:p-5 relative">
                                <div class="text-[8px] sm:text-[10px] text-[#b8860b] uppercase tracking-widest font-bold mb-1 sm:mb-2">
                                    {{ $product->category->name ?? 'Kategori Umum' }}
                                </div>
                                
                                <h3 class="text-xs sm:text-lg font-bold text-[#1b3b22] mb-1 sm:mb-3 font-serif leading-snug line-clamp-2">
                                    <a href="{{ route('katalog.show', $product->slug) }}" class="hover:text-[#b8860b] transition">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                
                                <div class="flex items-center justify-center gap-2 mb-2 sm:mb-3 mt-auto">
                                    <span class="text-gray-900 font-bold text-xs sm:text-base">
                                        Rp{{ number_format($product->productSizes->min('price') ?? 0, 0, ',', '.') }}
                                    </span>
                                </div>

                                <!-- Action Button -->
                                <a href="{{ route('katalog.show', $product->slug) }}" class="w-full bg-transparent border border-sm sm:border-2 border-[#1b3b22] text-[#1b3b22] group-hover:bg-[#1b3b22] group-hover:text-[#fdfbf7] text-center font-bold py-1.5 sm:py-2 text-[10px] sm:text-sm transition uppercase tracking-wider font-serif">
                                    Tingali
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-12 border-t border-[#b8860b]/20 pt-8">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="bg-white border-2 border-dashed border-[#b8860b]/30 rounded-lg p-12 text-center text-[#1b3b22]">
                        <div class="w-20 h-20 bg-[#fdfbf7] rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold font-serif mb-2 text-[#1b3b22]">Pangapunten (Mohon Maaf)</h3>
                        <p class="text-gray-500 mb-6">Kami tidak menemukan busana yang cocok dengan pencarian Anda.</p>
                        <a href="{{ route('katalog.index') }}" class="inline-block bg-[#1b3b22] text-[#fdfbf7] px-6 py-2.5 font-bold hover:bg-[#b8860b] hover:text-[#1b3b22] transition uppercase tracking-wider text-sm font-serif">Reset Saringan</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
