@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar Produk
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kolom Kiri: Informasi Dasar -->
            <div class="lg:col-span-2 space-y-6">
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">Informasi Dasar</h3>
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition @error('name') border-red-500 @enderror">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition bg-white @error('category_id') border-red-500 @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Produk</label>
                    <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Kolom Kanan: Media & Ukuran -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">Galeri Produk</h3>
                    
                    @if($product->images->count() > 0)
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        @foreach($product->images as $img)
                        <div class="relative rounded-lg overflow-hidden border border-gray-200 aspect-w-1 aspect-h-1 group">
                            <img src="{{ asset($img->image_path) }}" class="w-full h-24 object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <button type="button" onclick="deleteImage('{{ route('admin.products.destroyImage', $img->id) }}')" class="bg-red-600 text-white p-2 rounded-full hover:bg-red-700 shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <h4 class="text-sm font-bold text-gray-900 mb-2">Tambah Gambar</h4>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 transition relative">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 px-1">
                                    <span>Upload file(s)</span>
                                    <input id="images" name="images[]" type="file" class="sr-only" accept="image/jpeg,image/png,image/jpg" multiple onchange="previewImages(this)">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG up to 2MB. Tahan CTRL/CMD untuk pilih banyak.</p>
                        </div>
                    </div>
                    @error('images') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror

                    <!-- Preview Container -->
                    <div id="image-preview-container" class="mt-4 grid grid-cols-3 gap-2 hidden">
                        <!-- Preview images will be inserted here -->
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center border-b border-gray-100 pb-2 mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Variasi & Harga</h3>
                        <button type="button" onclick="addSizeRow()" class="text-sm text-blue-600 font-bold hover:underline flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah
                        </button>
                    </div>

                    <div id="sizes-container" class="space-y-3">
                        @if(old('sizes', $product->productSizes))
                            @foreach(old('sizes', $product->productSizes) as $index => $size)
                            <div class="flex gap-2 items-start size-row">
                                <div class="w-1/3">
                                    <input type="text" name="sizes[{{ $index }}][size]" value="{{ is_array($size) ? $size['size'] : $size->size }}" placeholder="Ukuran (M)" required class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none">
                                </div>
                                <div class="w-2/3 flex gap-2">
                                    <input type="number" name="sizes[{{ $index }}][price]" value="{{ is_array($size) ? $size['price'] : (int)$size->price }}" placeholder="Harga (Rp)" required min="0" class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none">
                                    <button type="button" onclick="removeSizeRow(this)" class="px-2 py-2 text-red-500 hover:bg-red-50 rounded border border-transparent hover:border-red-200 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <!-- Baris Variasi Default jika kosong (seharusnya tidak mungkin jika validasi benar) -->
                            <div class="flex gap-2 items-start size-row">
                                <div class="w-1/3">
                                    <input type="text" name="sizes[0][size]" placeholder="Ukuran (M)" required class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none">
                                </div>
                                <div class="w-2/3 flex gap-2">
                                    <input type="number" name="sizes[0][price]" placeholder="Harga (Rp)" required min="0" class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none">
                                    <button type="button" onclick="removeSizeRow(this)" class="px-2 py-2 text-red-500 hover:bg-red-50 rounded border border-transparent hover:border-red-200 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 bg-gray-900 text-white font-medium rounded-lg hover:bg-black transition shadow-sm">Simpan Perubahan</button>
        </div>
    </form>
</div>

<script>
    let sizeIndex = {{ count(old('sizes', $product->productSizes ?? [])) + 10 }}; // Offset agar index unik saat ditambah

    function addSizeRow() {
        const container = document.getElementById('sizes-container');
        const row = document.createElement('div');
        row.className = 'flex gap-2 items-start size-row';
        row.innerHTML = `
            <div class="w-1/3">
                <input type="text" name="sizes[${sizeIndex}][size]" placeholder="Ukuran" required class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none">
            </div>
            <div class="w-2/3 flex gap-2">
                <input type="number" name="sizes[${sizeIndex}][price]" placeholder="Harga (Rp)" required min="0" class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none">
                <button type="button" onclick="removeSizeRow(this)" class="px-2 py-2 text-red-500 hover:bg-red-50 rounded border border-transparent hover:border-red-200 transition">
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
@endsection
