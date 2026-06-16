@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Panduan Ukuran</h1>
    <div class="bg-white p-8 rounded-xl shadow-sm prose max-w-none">
        <p>Gunakan panduan berikut untuk menentukan ukuran pakaian yang tepat bagi buah hati Anda. Perlu diingat bahwa setiap anak memiliki postur tubuh yang berbeda, jadikan panduan ini sebagai estimasi umum.</p>
        
        <h3 class="text-xl font-bold mt-6 mb-4">Pakaian Bayi & Balita</h3>
        <table class="w-full text-left border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border border-gray-200 p-3">Ukuran</th>
                    <th class="border border-gray-200 p-3">Estimasi Usia</th>
                    <th class="border border-gray-200 p-3">Berat Badan (kg)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">Bayi/NB</td>
                    <td class="border border-gray-200 p-3">0 - 3 Bulan</td>
                    <td class="border border-gray-200 p-3">3 - 5 kg</td>
                </tr>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">0/XS</td>
                    <td class="border border-gray-200 p-3">3 - 12 Bulan</td>
                    <td class="border border-gray-200 p-3">5 - 9 kg</td>
                </tr>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">S</td>
                    <td class="border border-gray-200 p-3">1 - 2 Tahun</td>
                    <td class="border border-gray-200 p-3">9 - 12 kg</td>
                </tr>
            </tbody>
        </table>

        <h3 class="text-xl font-bold mt-8 mb-4">Pakaian Anak-Anak</h3>
        <table class="w-full text-left border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border border-gray-200 p-3">Ukuran</th>
                    <th class="border border-gray-200 p-3">Estimasi Usia</th>
                    <th class="border border-gray-200 p-3">Lebar Dada (cm)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">M</td>
                    <td class="border border-gray-200 p-3">3 - 4 Tahun</td>
                    <td class="border border-gray-200 p-3">32 cm</td>
                </tr>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">L</td>
                    <td class="border border-gray-200 p-3">5 - 6 Tahun</td>
                    <td class="border border-gray-200 p-3">35 cm</td>
                </tr>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">XL</td>
                    <td class="border border-gray-200 p-3">7 - 8 Tahun</td>
                    <td class="border border-gray-200 p-3">38 cm</td>
                </tr>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">XXL</td>
                    <td class="border border-gray-200 p-3">9 - 10 Tahun</td>
                    <td class="border border-gray-200 p-3">41 cm</td>
                </tr>
                <tr>
                    <td class="border border-gray-200 p-3 font-medium">L4, L5, Jumbo</td>
                    <td class="border border-gray-200 p-3">11 Tahun ke atas</td>
                    <td class="border border-gray-200 p-3">> 44 cm</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
