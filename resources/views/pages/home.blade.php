@extends('layouts.app')

@section('content')
<!-- Hero Section (Adat Jawa) -->
<div class="relative bg-[#fdfbf7] min-h-[550px] flex items-center overflow-hidden border-b-8 border-[#1b3b22]">
    <!-- Subtle background pattern -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#8b5a2b 1px, transparent 1px); background-size: 20px 20px;"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full flex flex-col-reverse md:flex-row items-center justify-between py-12 md:py-16 gap-8">
        
        <!-- Text Content -->
        <div class="w-full md:w-1/2" data-aos="fade-right">
            <h1 class="text-5xl md:text-7xl font-bold text-[#3e2723] leading-tight mb-2 font-serif">
                Sugeng Rawuh
            </h1>
            <h2 class="text-xl md:text-2xl text-[#5d4037] mb-6 italic font-serif">
                wonten ing Grosir Rizqi Barokah
            </h2>
            
            <!-- Ornamental Divider -->
            <div class="flex items-center gap-2 mb-6 opacity-70">
                <div class="h-px w-12 bg-[#1b3b22]"></div>
                <div class="w-2 h-2 rotate-45 bg-[#b8860b]"></div>
                <div class="w-2 h-2 rotate-45 bg-[#1b3b22]"></div>
                <div class="w-2 h-2 rotate-45 bg-[#b8860b]"></div>
                <div class="h-px w-12 bg-[#1b3b22]"></div>
            </div>

            <div class="inline-block bg-[#1b3b22] text-[#fdfbf7] px-4 py-1.5 font-bold text-xs tracking-widest uppercase mb-6 rounded-sm shadow-md">
                ⭐ Best Seller
            </div>
            
            <p class="text-xl text-[#3e2723] font-semibold mb-2 tracking-wide">
                Produsen Beskap Anak Premium
            </p>
            <p class="text-sm text-[#8b5a2b] mb-10 italic font-serif">
                By "Mubarok"
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 mb-12">
                <div class="flex items-center gap-3">
                    <div class="bg-[#b8860b] text-white rounded-full p-1.5 shadow-sm"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg></div>
                    <span class="text-sm font-medium text-[#5d4037]">Kualitas Terbaik</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="bg-[#b8860b] text-white rounded-full p-1.5 shadow-sm"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg></div>
                    <span class="text-sm font-medium text-[#5d4037]">Harga Grosir</span>
                </div>
            </div>

            <a href="{{ route('katalog.index') }}" class="inline-block bg-[#1b3b22] hover:bg-[#122817] text-[#fdfbf7] font-bold tracking-widest uppercase text-sm px-10 py-4 transition shadow-xl rounded-sm border border-[#b8860b]">
                LIHAT KATALOG
            </a>
        </div>

        <!-- Image Content (Framed) -->
        <div class="w-full md:w-1/2 flex justify-center md:justify-end relative" data-aos="fade-left" data-aos-delay="200">
            <div class="relative w-full max-w-md">
                <!-- Background decorative frame -->
                <div class="absolute inset-0 bg-[#b8860b] rounded-tl-[100px] rounded-br-[100px] transform translate-x-4 translate-y-4 opacity-50"></div>
                <!-- Main Image -->
                <div class="relative bg-white rounded-tl-[100px] rounded-br-[100px] overflow-hidden shadow-2xl border-4 border-[#fdfbf7]">
                    <img src="/img/hero-beskap.jpg" alt="Beskap Anak Premium" class="w-full h-[450px] object-cover object-top">
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Features Bar (Adat Jawa Rame Krem) -->
<div class="relative bg-[#faeed4] py-20 border-y-[12px] border-[#1b3b22] overflow-hidden">
    <!-- Rame Background Pattern (Batik style) -->
    <div class="absolute inset-0 opacity-[0.05]" style="background-image: radial-gradient(circle at center, #1b3b22 2px, transparent 2.5px), radial-gradient(circle at center, #b8860b 2px, transparent 2.5px); background-size: 24px 24px, 24px 24px; background-position: 0 0, 12px 12px;"></div>
    
    <!-- Top & Bottom border ornaments -->
    <div class="absolute top-0 left-0 w-full h-3 bg-repeat-x opacity-30" style="background-image: linear-gradient(45deg, #b8860b 25%, transparent 25%, transparent 75%, #b8860b 75%, #b8860b), linear-gradient(45deg, #b8860b 25%, transparent 25%, transparent 75%, #b8860b 75%, #b8860b); background-size: 10px 10px; background-position: 0 0, 5px 5px;"></div>
    <div class="absolute bottom-0 left-0 w-full h-3 bg-repeat-x opacity-30" style="background-image: linear-gradient(45deg, #b8860b 25%, transparent 25%, transparent 75%, #b8860b 75%, #b8860b), linear-gradient(45deg, #b8860b 25%, transparent 25%, transparent 75%, #b8860b 75%, #b8860b); background-size: 10px 10px; background-position: 0 0, 5px 5px;"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Title -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-[#1b3b22] font-serif mb-4 tracking-wide">Pelayanan Kagem Panjenengan</h2>
            <div class="flex justify-center items-center gap-3">
                <div class="w-16 h-[2px] bg-[#b8860b]"></div>
                <div class="w-3 h-3 rotate-45 bg-[#1b3b22]"></div>
                <div class="w-3 h-3 rotate-45 bg-[#b8860b]"></div>
                <div class="w-3 h-3 rotate-45 bg-[#1b3b22]"></div>
                <div class="w-16 h-[2px] bg-[#b8860b]"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 border-2 border-[#b8860b] relative group hover:-translate-y-2 transition duration-300 shadow-[6px_6px_0px_0px_#1b3b22]" data-aos="zoom-in" data-aos-delay="100">
                <!-- Corner Ornaments -->
                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-[#1b3b22] m-1"></div>
                
                <div class="flex justify-center mb-8 mt-2">
                    <div class="w-16 h-16 bg-[#faeed4] rotate-45 flex items-center justify-center border-2 border-[#b8860b] group-hover:bg-[#1b3b22] transition duration-500 shadow-md">
                        <svg class="w-8 h-8 text-[#1b3b22] -rotate-45 group-hover:text-white transition duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold text-[#3e2723] font-serif mb-3 uppercase tracking-wider">Pembayaran Aman</h3>
                    <div class="w-12 h-px bg-[#b8860b] mx-auto mb-3"></div>
                    <p class="text-[#5d4037] text-sm italic font-serif">Transaksi 100% Terpercaya</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 border-2 border-[#b8860b] relative group hover:-translate-y-2 transition duration-300 shadow-[6px_6px_0px_0px_#1b3b22]" data-aos="zoom-in" data-aos-delay="200">
                <!-- Corner Ornaments -->
                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-[#1b3b22] m-1"></div>
                
                <div class="flex justify-center mb-8 mt-2">
                    <div class="w-16 h-16 bg-[#faeed4] rotate-45 flex items-center justify-center border-2 border-[#b8860b] group-hover:bg-[#1b3b22] transition duration-500 shadow-md">
                        <svg class="w-8 h-8 text-[#1b3b22] -rotate-45 group-hover:text-white transition duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold text-[#3e2723] font-serif mb-3 uppercase tracking-wider">Retur Mudah</h3>
                    <div class="w-12 h-px bg-[#b8860b] mx-auto mb-3"></div>
                    <p class="text-[#5d4037] text-sm italic font-serif">Yen wonten cacat/rusak</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 border-2 border-[#b8860b] relative group hover:-translate-y-2 transition duration-300 shadow-[6px_6px_0px_0px_#1b3b22]" data-aos="zoom-in" data-aos-delay="300">
                <!-- Corner Ornaments -->
                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-[#1b3b22] m-1"></div>
                
                <div class="flex justify-center mb-8 mt-2">
                    <div class="w-16 h-16 bg-[#faeed4] rotate-45 flex items-center justify-center border-2 border-[#b8860b] group-hover:bg-[#1b3b22] transition duration-500 shadow-md">
                        <svg class="w-8 h-8 text-[#1b3b22] -rotate-45 group-hover:text-white transition duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold text-[#3e2723] font-serif mb-3 uppercase tracking-wider">Dukungan 24/7</h3>
                    <div class="w-12 h-px bg-[#b8860b] mx-auto mb-3"></div>
                    <p class="text-[#5d4037] text-sm italic font-serif">Admin Siap Mbiyantu</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white p-8 border-2 border-[#b8860b] relative group hover:-translate-y-2 transition duration-300 shadow-[6px_6px_0px_0px_#1b3b22]" data-aos="zoom-in" data-aos-delay="400">
                <!-- Corner Ornaments -->
                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-[#1b3b22] m-1"></div>
                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-[#1b3b22] m-1"></div>
                
                <div class="flex justify-center mb-8 mt-2">
                    <div class="w-16 h-16 bg-[#faeed4] rotate-45 flex items-center justify-center border-2 border-[#b8860b] group-hover:bg-[#1b3b22] transition duration-500 shadow-md">
                        <svg class="w-8 h-8 text-[#1b3b22] -rotate-45 group-hover:text-white transition duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold text-[#3e2723] font-serif mb-3 uppercase tracking-wider">Harga Grosir</h3>
                    <div class="w-12 h-px bg-[#b8860b] mx-auto mb-3"></div>
                    <p class="text-[#5d4037] text-sm italic font-serif">Pembelian jumlah ageng</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Arrivals Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 overflow-hidden">
    <div class="flex flex-col sm:flex-row justify-between items-center sm:items-end mb-12 border-b border-[#b8860b]/30 pb-6 gap-6" data-aos="fade-up">
        <div class="text-center sm:text-left">
            <p class="text-[#b8860b] font-serif italic mb-1 text-lg">Cek produk terbaru kagem putra-putri</p>
            <h2 class="text-4xl font-bold text-[#1b3b22] font-serif tracking-wide">Koleksi Terbaru</h2>
        </div>
        <a href="{{ route('katalog.index') }}" class="w-full sm:w-auto text-center border-2 border-[#1b3b22] text-[#1b3b22] font-bold uppercase tracking-widest text-sm px-8 py-3 hover:bg-[#1b3b22] hover:text-[#fdfbf7] transition duration-300 shadow-sm">
            LIHAT SEMUA
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
        @foreach($latestProducts as $product)
        <div class="group relative bg-white p-2 sm:p-3 border border-[#b8860b]/30 shadow-sm hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="aspect-w-1 aspect-h-1 overflow-hidden relative mb-3 sm:mb-4 bg-[#faeed4] border border-[#b8860b]/20">
                <img src="{{ $product->image_path ?: 'https://via.placeholder.com/400' }}" alt="{{ $product->name }}" class="w-full h-40 sm:h-72 object-center object-cover group-hover:scale-110 transition duration-700">
                <!-- Removed GROSIR badge -->
            </div>
            <div class="px-1 sm:px-2 pb-1 sm:pb-2">
                <h3 class="text-sm sm:text-lg font-bold text-[#3e2723] font-serif mb-1 group-hover:text-[#1b3b22] transition line-clamp-2 sm:line-clamp-1 leading-tight">
                    <a href="{{ route('katalog.show', $product->slug) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $product->name }}
                    </a>
                </h3>
                <div class="flex items-center gap-2 mt-1 sm:mt-2">
                    <p class="text-[#1b3b22] font-bold text-sm sm:text-lg">
                        @if($product->productSizes->count() > 0)
                            Rp{{ number_format($product->productSizes->min('price'), 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
