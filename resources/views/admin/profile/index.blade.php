@extends('layouts.admin')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Header Banner -->
    <div class="bg-gradient-to-r from-[#1b3b22] to-[#2c5c35] px-8 py-8 rounded-2xl shadow-lg mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-64 h-64 rounded-full bg-white opacity-5"></div>
        <div class="relative z-10">
            <h2 class="text-2xl font-bold text-white mb-2 font-serif tracking-wide flex items-center gap-2">
                <svg class="w-7 h-7 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Pengaturan Akun Admin
            </h2>
            <p class="text-[#faeed4] opacity-90 text-sm">Kelola keamanan akun, ubah email dan password untuk login ke panel admin.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.profile.update') }}" method="POST" class="p-8">
            @csrf
            @method('PUT')

            <div class="space-y-10">
                <!-- Bagian Email -->
                <div>
                    <h3 class="text-lg font-bold text-[#1b3b22] border-b-2 border-gray-100 pb-3 mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Informasi Login
                    </h3>
                    
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full rounded-xl bg-gray-50 border-gray-200 border px-4 py-3 focus:bg-white focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200 @error('email') border-red-500 @enderror">
                        @error('email') <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Bagian Password -->
                <div>
                    <div class="border-b-2 border-gray-100 pb-3 mb-6 flex items-end justify-between">
                        <h3 class="text-lg font-bold text-[#1b3b22] flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Ganti Password
                        </h3>
                        <p class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded">Biarkan kosong jika tidak ingin diubah.</p>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="current_password" class="block text-sm font-bold text-gray-700 mb-2">Password Saat Ini</label>
                            <input type="password" name="current_password" id="current_password" class="w-full rounded-xl bg-gray-50 border-gray-200 border px-4 py-3 focus:bg-white focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200 @error('current_password') border-red-500 @enderror">
                            @error('current_password') <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50/50 p-5 rounded-2xl border border-gray-100">
                            <div>
                                <label for="new_password" class="block text-sm font-bold text-gray-700 mb-2">Password Baru</label>
                                <input type="password" name="new_password" id="new_password" class="w-full rounded-xl bg-white border-gray-200 border px-4 py-3 focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200 @error('new_password') border-red-500 @enderror">
                                @error('new_password') <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="new_password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full rounded-xl bg-white border-gray-200 border px-4 py-3 focus:border-[#b8860b] focus:ring-4 focus:ring-[#b8860b]/10 transition duration-200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
                <button type="submit" class="w-full sm:w-auto bg-[#1b3b22] hover:bg-[#2c5c35] text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-[#1b3b22]/30 transform hover:-translate-y-1 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
