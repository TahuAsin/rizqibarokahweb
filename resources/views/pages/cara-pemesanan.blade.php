@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Cara Pemesanan</h1>
    <div class="bg-white p-8 rounded-xl shadow-sm prose max-w-none">
        <ol class="list-decimal list-inside space-y-4 text-gray-700 leading-relaxed text-lg">
            <li>Buka halaman <a href="{{ route('katalog.index') }}" class="text-blue-600 font-bold hover:underline">Katalog Produk</a>.</li>
            <li>Pilih produk yang Anda inginkan dan klik "Lihat Detail".</li>
            <li>Pada halaman detail produk, pilih ukuran yang sesuai dengan kebutuhan Anda.</li>
            <li>Periksa kembali detail pesanan dan harga yang tertera.</li>
            <li>Klik tombol hijau "Pesan via WhatsApp".</li>
            <li>Anda akan otomatis diarahkan ke WhatsApp Admin dengan format teks pemesanan.</li>
            <li>Kirim pesan tersebut, dan Admin kami akan membalas dengan total tagihan serta informasi pembayaran.</li>
            <li>Lakukan pembayaran sesuai instruksi Admin, kemudian kirimkan bukti transfer.</li>
            <li>Pesanan Anda akan segera kami proses dan kirimkan.</li>
        </ol>
    </div>
</div>
@endsection
