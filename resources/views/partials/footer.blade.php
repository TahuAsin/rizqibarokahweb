<footer class="bg-[#1b3b22] text-[#fdfbf7] mt-12 border-t-[8px] border-[#b8860b] relative overflow-hidden">
    <!-- Batik subtle overlay -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle at center, #fdfbf7 2px, transparent 2.5px); background-size: 24px 24px;"></div>
    
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-6 text-[#b8860b] font-serif tracking-wider">Grosir Rizqi Barokah</h3>
                <p class="text-[#faeed4] text-sm leading-relaxed">
                    Menyediakan berbagai macam pakaian tradisional anak dan bayi dengan kualitas terbaik dan harga grosir. Melestarikan budaya nganti anak putu.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-6 text-[#b8860b] font-serif tracking-wider">Kebijakan Toko</h3>
                <ul class="space-y-3 text-sm text-[#faeed4]">
                    <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 rotate-45 bg-[#b8860b]"></div> Jam Operasional: Senin - Sabtu (08:00 - 17:00)</li>
                    <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 rotate-45 bg-[#b8860b]"></div> <a href="{{ route('cara-pemesanan') }}" class="hover:text-white transition duration-300">Cara Pemesanan</a></li>
                    <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 rotate-45 bg-[#b8860b]"></div> <span class="hover:text-white cursor-pointer transition duration-300">Kebijakan Retur</span></li>
                </ul>
            </div>
            <div>
                @php $footerContact = \App\Models\Contact::first(); @endphp
                <h3 class="text-xl font-bold mb-6 text-[#b8860b] font-serif tracking-wider">Kontak Kami</h3>
                <ul class="space-y-3 text-sm text-[#faeed4]">
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        WhatsApp: {{ $footerContact->whatsapp ?? '+62 812-3456-7890' }}
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Email: {{ $footerContact->email ?? 'info@rizqibarokah.com' }}
                    </li>
                    <li class="flex items-center gap-3 items-start">
                        <svg class="w-5 h-5 text-[#b8860b] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="whitespace-pre-line">{{ $footerContact->address ?? "Pasar Klewer, Kios Blok E No. 45\nSurakarta, Jawa Tengah 57122" }}</span>
                    </li>
                </ul>
                <div class="mt-6 flex space-x-4">
                    <!-- Social icons -->
                    <a href="#" class="w-10 h-10 rounded-full border border-[#b8860b] flex items-center justify-center text-[#b8860b] hover:bg-[#b8860b] hover:text-[#1b3b22] transition duration-300">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-[#b8860b]/30 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-[#faeed4]">
            <p>&copy; {{ date('Y') }} Grosir Rizqi Barokah. Hak Cipta Dilindungi.</p>
            <p class="mt-2 md:mt-0 italic font-serif opacity-80">Damelan Asli Tiyang Jawi</p>
        </div>
    </div>
</footer>
