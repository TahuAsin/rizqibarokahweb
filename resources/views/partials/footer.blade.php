<footer class="bg-[#1b3b22] text-[#fdfbf7] mt-12 border-t-[8px] border-[#b8860b] relative overflow-hidden">
    <!-- Batik subtle overlay -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle at center, #fdfbf7 2px, transparent 2.5px); background-size: 24px 24px;"></div>
    
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-16" data-aos="fade-up">
            
            <!-- Column 1: About -->
            <div class="md:col-span-12 lg:col-span-5">
                <h3 class="text-3xl font-bold mb-6 text-[#b8860b] font-serif tracking-wider">
                    Grosir Rizqi Barokah
                </h3>
                <p class="text-[#faeed4] text-base leading-relaxed opacity-90 mb-6 max-w-md">
                    Menyediakan berbagai macam pakaian tradisional anak dan bayi dengan kualitas terbaik dan harga grosir. Melestarikan budaya nganti anak putu.
                </p>
                <div class="flex items-center gap-3">
                    <div class="h-[2px] w-12 bg-[#b8860b]"></div>
                    <div class="w-2 h-2 rotate-45 bg-[#b8860b]"></div>
                    <div class="h-[2px] w-12 bg-[#b8860b]"></div>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="md:col-span-6 lg:col-span-3">
                <h3 class="text-xl font-bold mb-6 text-[#b8860b] font-serif tracking-wider relative inline-block">
                    Layanan Pelanggan
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#b8860b]"></span>
                </h3>
                <ul class="space-y-4 text-sm text-[#faeed4] mt-4">
                    <li><a href="{{ route('cara-pemesanan') }}" class="group flex items-center gap-3 hover:text-white transition duration-300"><span class="w-2 h-2 border border-[#b8860b] group-hover:bg-[#b8860b] rotate-45 transition"></span> Cara Pemesanan</a></li>
                    <li><a href="{{ route('katalog.index') }}" class="group flex items-center gap-3 hover:text-white transition duration-300"><span class="w-2 h-2 border border-[#b8860b] group-hover:bg-[#b8860b] rotate-45 transition"></span> Katalog Produk</a></li>
                    <li><a href="{{ route('kontak') }}" class="group flex items-center gap-3 hover:text-white transition duration-300"><span class="w-2 h-2 border border-[#b8860b] group-hover:bg-[#b8860b] rotate-45 transition"></span> Hubungi Kami</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div class="md:col-span-6 lg:col-span-4">
                @php $footerContact = \App\Models\Contact::first(); @endphp
                <h3 class="text-xl font-bold mb-6 text-[#b8860b] font-serif tracking-wider relative inline-block">
                    Kontak Kami
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-[#b8860b]"></span>
                </h3>
                <ul class="space-y-5 text-sm text-[#faeed4] mt-4">
                    <li class="flex items-center gap-4 group">
                        <div class="p-2.5 bg-[#b8860b]/10 rounded-full group-hover:bg-[#b8860b]/20 transition">
                            <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <span class="text-base">{{ $footerContact->whatsapp ?? '+62 812-3456-7890' }}</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="p-2.5 bg-[#b8860b]/10 rounded-full group-hover:bg-[#b8860b]/20 transition">
                            <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-base">{{ $footerContact->email ?? 'info@rizqibarokah.com' }}</span>
                    </li>
                    <li class="flex items-start gap-4 group">
                        <div class="p-2.5 bg-[#b8860b]/10 rounded-full group-hover:bg-[#b8860b]/20 transition mt-1">
                            <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="whitespace-pre-line text-base leading-relaxed">{{ $footerContact->address ?? "Pasar Klewer, Kios Blok E No. 45\nSurakarta, Jawa Tengah 57122" }}</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="mt-16 border-t border-[#b8860b]/20 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-[#faeed4]/60">
            <p>&copy; {{ date('Y') }} Grosir Rizqi Barokah. Hak Cipta Dilindungi.</p>
            <p class="mt-2 md:mt-0 italic font-serif text-[#b8860b]/80">Damelan Asli Tiyang Jawi</p>
        </div>
    </div>
</footer>
