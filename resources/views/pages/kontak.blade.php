@extends('layouts.app')

@section('content')
<div class="relative min-h-[60vh] py-20 bg-[#fdfbf7] overflow-hidden">
    <!-- Background accents -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-[#1b3b22]/5 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-[#b8860b]/10 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-[#1b3b22] font-serif mb-4 tracking-wider">Hubungi Kami</h1>
            <div class="h-1 w-24 bg-[#b8860b] mx-auto rounded-full mb-6"></div>
            <p class="text-[#3e2723] text-lg max-w-2xl mx-auto">
                Silakan hubungi kami untuk informasi lebih lanjut mengenai pemesanan, produk, atau pertanyaan lainnya. Kami siap membantu Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 lg:gap-8 items-start">
            
            <!-- Contact Information Cards -->
            <div class="lg:col-span-2 space-y-6">
                <!-- WhatsApp Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-[#b8860b]/20 hover:shadow-xl hover:border-[#b8860b]/50 transition duration-300 group">
                    <div class="w-14 h-14 bg-[#1b3b22]/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#1b3b22]/20 transition">
                        <svg class="w-7 h-7 text-[#1b3b22]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#1b3b22] font-serif mb-2">WhatsApp</h3>
                    <p class="text-[#3e2723] text-lg font-medium mb-4">
                        {{ $contact->whatsapp ?? '+62 812-3456-7890' }}
                    </p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp ?? '6281234567890') }}" target="_blank" class="inline-flex items-center text-[#b8860b] font-bold hover:text-[#1b3b22] transition">
                        Hubungi Sekarang <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <!-- Email Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-[#b8860b]/20 hover:shadow-xl hover:border-[#b8860b]/50 transition duration-300 group">
                    <div class="w-14 h-14 bg-[#1b3b22]/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#1b3b22]/20 transition">
                        <svg class="w-7 h-7 text-[#1b3b22]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#1b3b22] font-serif mb-2">Email</h3>
                    <p class="text-[#3e2723] text-lg font-medium mb-4">
                        {{ $contact->email ?? 'info@rizqibarokah.com' }}
                    </p>
                    <a href="mailto:{{ $contact->email ?? 'info@rizqibarokah.com' }}" class="inline-flex items-center text-[#b8860b] font-bold hover:text-[#1b3b22] transition">
                        Kirim Pesan <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <!-- Address Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-[#b8860b]/20 hover:shadow-xl hover:border-[#b8860b]/50 transition duration-300 group">
                    <div class="w-14 h-14 bg-[#1b3b22]/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#1b3b22]/20 transition">
                        <svg class="w-7 h-7 text-[#1b3b22]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#1b3b22] font-serif mb-2">Alamat Toko</h3>
                    <p class="text-[#3e2723] leading-relaxed mb-0 whitespace-pre-line">
                        {{ $contact->address ?? "Pasar Klewer, Kios Blok E No. 45\nSurakarta, Jawa Tengah 57122" }}
                    </p>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="lg:col-span-3">
                <div class="bg-white p-2 rounded-2xl shadow-xl border-2 border-[#1b3b22]/10 h-full min-h-[500px] lg:min-h-[600px] overflow-hidden relative group">
                    <div class="absolute inset-0 z-0 bg-gray-100 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-300 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="absolute inset-2 z-10 rounded-xl overflow-hidden [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:border-0 [&>iframe]:absolute [&>iframe]:inset-0">
                        @if($contact && $contact->map_embed)
                            {!! $contact->map_embed !!}
                        @else
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.105406560416!2d110.8256561!3d-7.574409399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1662d5568bd9%3A0x6d8591873dc2d97!2sPasar%20Klewer%20Solo!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @endif
                    </div>
                    <!-- Decorative corner -->
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#b8860b] rounded-tl-full z-20 opacity-20 pointer-events-none group-hover:scale-110 transition duration-500"></div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
