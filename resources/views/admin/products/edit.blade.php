@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar Produk
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-[#1b3b22] to-[#2c5c35] px-8 py-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-white flex items-center gap-2 font-serif tracking-wide">
            <svg class="w-6 h-6 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            Edit Produk: {{ $product->name }}
        </h2>
        <p class="text-[#faeed4] text-sm mt-1 opacity-90">Perbarui informasi, harga, atau foto produk katalog ini.</p>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Kolom Kiri: Informasi Dasar -->
            <div class="lg:col-span-2 space-y-7">
                
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-4 focus:ring-[#b8860b]/20 focus:border-[#b8860b] outline-none transition-all duration-300 @error('name') border-red-500 @enderror">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select name="category_id" id="category_id" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-4 focus:ring-[#b8860b]/20 focus:border-[#b8860b] outline-none transition-all duration-300 appearance-none @error('category_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    @error('category_id') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Produk</label>
                    <div class="rounded-xl overflow-hidden border border-gray-200 focus-within:border-[#b8860b] focus-within:ring-4 focus-within:ring-[#b8860b]/20 transition-all duration-300">
                        <textarea name="description" id="description" rows="5" class="w-full px-4 py-3 border-none outline-none @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                    </div>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Kolom Kanan: Media & Ukuran -->
            <div class="space-y-8 bg-gray-50/50 p-6 rounded-2xl border border-gray-100">
                <div>
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Galeri Produk
                    </h3>
                    
                    @if($product->images->count() > 0)
                    <div class="grid grid-cols-3 gap-3 mb-6">
                        @foreach($product->images as $img)
                        <div class="relative rounded-xl overflow-hidden border border-gray-200 aspect-w-1 aspect-h-1 group shadow-sm">
                            <img src="{{ asset($img->image_path) }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center backdrop-blur-sm">
                                <button type="button" onclick="deleteImage('{{ route('admin.products.destroyImage', $img->id) }}')" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 shadow-lg transform hover:scale-110 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <div class="mt-1 flex justify-center px-6 pt-6 pb-8 border-2 border-dashed border-[#b8860b]/40 rounded-xl bg-white hover:bg-[#faeed4]/30 transition duration-300 relative group cursor-pointer" onclick="document.getElementById('images').click()">
                        <div class="space-y-2 text-center">
                            <div class="w-14 h-14 bg-[#faeed4] text-[#b8860b] rounded-full flex items-center justify-center mx-auto group-hover:scale-110 transition duration-300 shadow-sm">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="images" class="relative cursor-pointer bg-transparent rounded-md font-medium text-[#1b3b22] hover:text-[#b8860b]">
                                    <span>Tambah Gambar</span>
                                    <input id="images" name="images[]" type="file" class="sr-only" accept="image/jpeg,image/png,image/jpg" multiple onchange="previewImages(this)">
                                </label>
                            </div>
                            <p class="text-xs text-gray-400">JPG, PNG maksimal 2MB per foto.</p>
                        </div>
                    </div>
                    @error('images') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror

                    <!-- Preview Container -->
                    <div id="image-preview-container" class="mt-4 grid grid-cols-3 gap-3 hidden">
                        <!-- Preview images will be inserted here -->
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#b8860b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            Variasi & Harga
                        </h3>
                        <button type="button" onclick="addSizeRow()" class="text-xs bg-[#faeed4] text-[#1b3b22] font-bold px-3 py-1.5 rounded-lg hover:bg-[#b8860b] hover:text-white transition flex items-center gap-1 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah
                        </button>
                    </div>

                    <div id="sizes-container" class="space-y-3">
                        @if(old('sizes', $product->productSizes))
                            @foreach(old('sizes', $product->productSizes) as $index => $size)
                            <div class="flex gap-2 items-start size-row bg-white p-2 border border-gray-200 rounded-xl shadow-sm">
                                <div class="w-1/3">
                                    <input type="text" name="sizes[{{ $index }}][size]" value="{{ is_array($size) ? $size['size'] : $size->size }}" placeholder="Ukuran" required class="w-full px-3 py-2.5 bg-gray-50 border border-transparent rounded-lg text-sm focus:bg-white focus:border-[#b8860b] focus:ring-2 focus:ring-[#b8860b]/20 outline-none transition">
                                </div>
                                <div class="w-2/3 flex gap-2">
                                    <input type="number" name="sizes[{{ $index }}][price]" value="{{ is_array($size) ? $size['price'] : (int)$size->price }}" placeholder="Harga (Rp)" required min="0" class="w-full px-3 py-2.5 bg-gray-50 border border-transparent rounded-lg text-sm focus:bg-white focus:border-[#b8860b] focus:ring-2 focus:ring-[#b8860b]/20 outline-none transition">
                                    <button type="button" onclick="removeSizeRow(this)" class="px-2.5 py-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus variasi">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <!-- Baris Variasi Default -->
                            <div class="flex gap-2 items-start size-row bg-white p-2 border border-gray-200 rounded-xl shadow-sm">
                                <div class="w-1/3">
                                    <input type="text" name="sizes[0][size]" placeholder="Ukuran" required class="w-full px-3 py-2.5 bg-gray-50 border border-transparent rounded-lg text-sm focus:bg-white focus:border-[#b8860b] focus:ring-2 focus:ring-[#b8860b]/20 outline-none transition">
                                </div>
                                <div class="w-2/3 flex gap-2">
                                    <input type="number" name="sizes[0][price]" placeholder="Harga (Rp)" required min="0" class="w-full px-3 py-2.5 bg-gray-50 border border-transparent rounded-lg text-sm focus:bg-white focus:border-[#b8860b] focus:ring-2 focus:ring-[#b8860b]/20 outline-none transition">
                                    <button type="button" onclick="removeSizeRow(this)" class="px-2.5 py-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus variasi">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition tracking-wide">Batal</a>
            <button type="submit" class="px-8 py-3 bg-[#1b3b22] text-[#fdfbf7] font-bold rounded-xl hover:bg-[#122817] hover:shadow-lg transition flex items-center gap-2 tracking-wide">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    let sizeIndex = {{ count(old('sizes', $product->productSizes ?? [])) + 10 }}; // Offset agar index unik saat ditambah

    function addSizeRow() {
        const container = document.getElementById('sizes-container');
        const row = document.createElement('div');
        row.className = 'flex gap-2 items-start size-row bg-white p-2 border border-gray-200 rounded-xl shadow-sm';
        row.innerHTML = `
            <div class="w-1/3">
                <input type="text" name="sizes[${sizeIndex}][size]" placeholder="Ukuran" required class="w-full px-3 py-2.5 bg-gray-50 border border-transparent rounded-lg text-sm focus:bg-white focus:border-[#b8860b] focus:ring-2 focus:ring-[#b8860b]/20 outline-none transition">
            </div>
            <div class="w-2/3 flex gap-2">
                <input type="number" name="sizes[${sizeIndex}][price]" placeholder="Harga (Rp)" required min="0" class="w-full px-3 py-2.5 bg-gray-50 border border-transparent rounded-lg text-sm focus:bg-white focus:border-[#b8860b] focus:ring-2 focus:ring-[#b8860b]/20 outline-none transition">
                <button type="button" onclick="removeSizeRow(this)" class="px-2.5 py-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus variasi">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
            </div>
        `;
        container.appendChild(row);
        sizeIndex++;
    }

    function removeSizeRow(button) {
        const rows = document.querySelectorAll('.size-row');
        if (rows.length > 1) {
            button.closest('.size-row').remove();
        } else {
            alert('Minimal harus ada 1 variasi ukuran & harga.');
        }
    }

    function previewImages(input) {
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = ''; // Clear existing
        
        if (input.files && input.files.length > 0) {
            previewContainer.classList.remove('hidden');
            
            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative rounded-lg overflow-hidden border border-gray-200 aspect-w-1 aspect-h-1';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-24 object-cover">
                    `;
                    previewContainer.appendChild(div);
                }
                
                reader.readAsDataURL(file);
            });
        } else {
            previewContainer.classList.add('hidden');
        }
    }

    function deleteImage(url) {
        if (confirm('Apakah Anda yakin ingin menghapus gambar ini?')) {
            const form = document.getElementById('delete-image-form');
            form.action = url;
            form.submit();
        }
    }
</script>

<form id="delete-image-form" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#description',
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        promotion: false
    });
</script>
@endpush
@endsection
