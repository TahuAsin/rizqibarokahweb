@extends('layouts.admin')

@section('title', 'Pengaturan Kontak')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header Banner -->
    <div class="bg-gradient-to-r from-[#1b3b22] to-[#2c5c35] px-8 py-8 rounded-2xl shadow-lg mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-64 h-64 rounded-full bg-white opacity-5"></div>
        <div class="relative z-10">
            <h2 class="text-2xl font-bold text-white mb-2 font-serif tracking-wide flex items-center gap-2">
                <svg class="w-7 h-7 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                Pengaturan Kontak & Lokasi
            </h2>
            <p class="text-[#faeed4] opacity-90 text-sm">Kelola informasi kontak dan lokasi peta yang akan ditampilkan di website publik.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
        <form action="{{ route('admin.contact.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- WhatsApp -->
                <div>
                    <label for="whatsapp" class="block text-sm font-bold text-gray-700 mb-2">Nomor WhatsApp</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-[#b8860b]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </div>
                        <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $contact?->whatsapp) }}" class="pl-12 w-full rounded-xl bg-gray-50 border-gray-200 border px-4 py-3 focus:bg-white focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200" placeholder="Contoh: +62 812-3456-7890">
                    </div>
                    @error('whatsapp') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <input type="text" name="email" id="email" value="{{ old('email', $contact?->email) }}" class="pl-12 w-full rounded-xl bg-gray-50 border-gray-200 border px-4 py-3 focus:bg-white focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200" placeholder="Contoh: info@rizqibarokah.com">
                    </div>
                    @error('email') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-bold text-gray-700 mb-2">Alamat Toko</label>
                    <textarea name="address" id="address" rows="3" class="w-full rounded-xl bg-gray-50 border-gray-200 border px-4 py-3 focus:bg-white focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200" placeholder="Contoh: Pasar Klewer, Kios Blok E No. 45&#10;Surakarta, Jawa Tengah 57122">{{ old('address', $contact?->address) }}</textarea>
                    @error('address') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Map Embed -->
                <div>
                    <label for="map_embed" class="block text-sm font-bold text-gray-700 mb-2">Google Maps Embed Code (Iframe)</label>
                    <textarea name="map_embed" id="map_embed" rows="4" class="w-full rounded-xl bg-gray-50 border-gray-200 border px-4 py-3 focus:bg-white focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200 font-mono text-xs" placeholder="Paste kode iframe dari Google Maps di sini...">{{ old('map_embed', $contact?->map_embed) }}</textarea>
                    <p class="text-xs text-gray-500 mt-2 bg-blue-50 p-3 rounded-lg border border-blue-100"><strong class="text-blue-700">Cara mendapatkan:</strong> Buka Google Maps > Cari lokasi > Klik Bagikan (Share) > Sematkan Peta (Embed a map) > Salin HTML (Copy HTML).</p>
                    @error('map_embed') <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Map Preview (if exists) -->
                @if($contact && $contact->map_embed)
                <div class="mt-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pratinjau Peta</label>
                    <div class="w-full h-64 bg-gray-50 rounded-xl overflow-hidden border-2 border-gray-100 shadow-inner">
                        {!! $contact->map_embed !!}
                    </div>
                </div>
                @endif
            </div>

            <div class="mt-10 pt-6 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-end">
                <button type="submit" class="w-full sm:w-auto bg-[#1b3b22] hover:bg-[#2c5c35] text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-[#1b3b22]/30 transform hover:-translate-y-1 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Responsive map preview */
    .overflow-hidden iframe {
        width: 100% !important;
        height: 100% !important;
        border: 0 !important;
    }
</style>
@endsection
