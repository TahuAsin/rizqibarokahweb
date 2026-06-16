@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" x-data="productDetail({{ $product->productSizes->toJson() }})">
    
    <!-- Breadcrumbs -->
    <div class="text-sm text-gray-500 mb-8 font-medium">
        <a href="{{ route('home') }}" class="hover:text-black transition">Home</a> / 
        <a href="{{ route('katalog.index', ['category' => [$product->category_id]]) }}" class="hover:text-black transition">{{ $product->category->name ?? 'Category' }}</a> / 
        <span class="text-gray-900">{{ $product->name }}</span>
    </div>

    <!-- Main Layout -->
    <div class="flex flex-col lg:flex-row gap-12 mb-16">
        
        <!-- Left Side (Product Image, Info & Tabs) -->
        <div class="w-full lg:w-3/4">
            
            <!-- Top Part: Image & Info -->
            <div class="flex flex-col md:flex-row gap-8">
                
                <!-- Product Image & Gallery -->
                <div class="w-full md:w-1/2 flex flex-col gap-4">
                    <!-- Main Image -->
                    <div class="relative bg-gray-50 flex items-center justify-center p-8 aspect-w-1 aspect-h-1 md:aspect-none md:h-[500px]">
                        <img :src="mainImage" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain mix-blend-multiply transition-all duration-300">
                        <!-- Removed GROSIR badge -->
                    </div>
                    
                    <!-- Thumbnails -->
                    @if($product->images->count() > 1)
                    <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-hide">
                        @foreach($product->images as $img)
                        <button @click="mainImage = '{{ asset($img->image_path) }}'" class="w-20 h-20 p-2 flex-shrink-0 bg-gray-50 border-2 transition-all duration-200" :class="mainImage === '{{ asset($img->image_path) }}' ? 'border-[#1b3b22]' : 'border-transparent hover:border-gray-300'">
                            <img src="{{ asset($img->image_path) }}" alt="Thumbnail" class="w-full h-full object-cover mix-blend-multiply">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>
                
                <!-- Product Info -->
                <div class="w-full md:w-1/2 flex flex-col">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2 font-mono tracking-tighter">{{ $product->name }}</h1>
                    
                    <!-- Removed stars review section -->
                    
                    <div class="flex items-center gap-2 mb-6">
                        <span class="text-2xl font-bold text-gray-900" x-text="formatPrice(selectedPrice)">
                            Rp{{ number_format($product->productSizes->min('price') ?? 0, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="text-gray-600 text-sm leading-relaxed mb-8">
                        {{ \Illuminate\Support\Str::limit($product->description, 150, '...') }}
                    </div>
                    
                    <!-- Size Selector & CTA -->
                    <div class="mt-auto">
                        <div class="mb-5">
                            <h3 class="text-xs font-bold text-gray-900 mb-3 uppercase tracking-wider">Ukuran</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($product->productSizes as $size)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="size" value="{{ $size->size }}" class="sr-only peer" x-model="selectedSize" @change="updatePrice('{{ $size->price }}')">
                                        <div class="text-center min-w-[3rem] py-1.5 px-3 border border-gray-300 text-sm font-medium peer-checked:bg-[#1b3b22] peer-checked:text-white peer-checked:border-[#1b3b22] hover:border-gray-400 transition">
                                            {{ $size->size }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <!-- Button CTA -->
                            <button @click="orderViaWhatsApp()" :disabled="!selectedSize" class="flex-grow bg-[#1b3b22] hover:bg-[#122817] text-white font-bold py-3 px-6 text-sm transition disabled:opacity-50 disabled:cursor-not-allowed uppercase tracking-wider">
                                Pesan via WhatsApp
                            </button>
                        </div>
                        <p x-show="!selectedSize" class="text-[#1b3b22] text-xs mt-2">* Silakan pilih ukuran</p>

                        <div class="mt-6 pt-6 border-t border-gray-200 text-xs text-gray-500">
                            <span class="font-bold text-gray-900">KATEGORI:</span> <span class="uppercase">{{ $product->category->name ?? '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Tabs (Description / Reviews) -->
            <div class="mt-16">
                <!-- Tab Headers -->
                <div class="flex border-b border-gray-200 gap-8 justify-center lg:justify-start mb-8">
                    <button class="pb-4 font-bold text-xs tracking-wider border-b-2 border-[#1b3b22] text-[#1b3b22] uppercase">Deskripsi</button>
                    <button class="pb-4 font-bold text-xs tracking-wider border-b-2 border-transparent text-gray-500 hover:text-gray-900 uppercase transition">Ulasan (0)</button>
                </div>
                
                <!-- Tab Content -->
                <div class="flex flex-col lg:flex-row gap-10">
                    <div class="w-full lg:w-2/3 text-gray-600 text-sm leading-loose space-y-6">
                        <p>{{ $product->description }}</p>
                    </div>
                    
                    <div class="w-full lg:w-1/3">
                        <div class="bg-[#222222] text-white p-8 h-full flex flex-col justify-center min-h-[300px]">
                            <p class="text-sm text-gray-300 leading-relaxed italic mb-8">
                                "Menyediakan pakaian tradisional bayi dan anak dengan bahan terbaik yang nyaman digunakan seharian. Kami pastikan kualitas selalu prima dengan harga grosir yang ramah."
                            </p>
                            <div class="font-serif text-3xl mb-2 text-gray-300 italic">Rizqi Barokah</div>
                            <div class="text-xs text-gray-500 tracking-wider">OWNER, RIZQI BAROKAH</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Right Side (Sidebar Other Products) -->
        <div class="w-full lg:w-1/4 lg:pl-8 lg:border-l border-gray-100">
            <h3 class="text-lg font-bold text-gray-900 mb-6 font-mono tracking-tighter">Produk Lainnya</h3>
            <div class="space-y-6">
                @php
                    // Fetch 5 random products to display as other products
                    $otherProducts = \App\Models\Product::with('productSizes')
                                        ->where('id', '!=', $product->id)
                                        ->inRandomOrder()
                                        ->take(5)
                                        ->get();
                @endphp
                @foreach($otherProducts as $otherProduct)
                <div class="flex items-center gap-4 group cursor-pointer" onclick="window.location='{{ route('katalog.show', $otherProduct->slug) }}'">
                    <div class="w-20 h-20 bg-gray-50 flex-shrink-0 flex items-center justify-center p-2">
                        <img src="{{ $otherProduct->image_path ?: 'https://via.placeholder.com/150' }}" class="max-w-full max-h-full object-contain mix-blend-multiply group-hover:scale-110 transition duration-300">
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-600 group-hover:text-[#1b3b22] transition line-clamp-1 mb-1">{{ $otherProduct->name }}</h4>
                        <div class="text-xs font-bold text-gray-900">
                            Rp{{ number_format($otherProduct->productSizes->min('price') ?? 0, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>
</div>

@php
    $contact = \App\Models\Contact::first();
    $waNumber = $contact ? preg_replace('/[^0-9]/', '', $contact->whatsapp) : '6281234567890';
    if (str_starts_with($waNumber, '0')) {
        $waNumber = '62' . substr($waNumber, 1);
    }
@endphp

<script>
    function productDetail(sizes) {
        return {
            selectedSize: '',
            selectedPrice: sizes.length > 0 ? Math.min(...sizes.map(s => s.price)) : 0,
            productName: '{{ addslashes($product->name) }}',
            mainImage: '{{ $product->image_path ? asset($product->image_path) : 'https://via.placeholder.com/600' }}',
            waNumber: '{{ $waNumber }}',
            
            updatePrice(price) {
                this.selectedPrice = price;
            },
            
            formatPrice(price) {
                if (price == 0) return 'Harga tidak tersedia';
                return 'Rp' + new Intl.NumberFormat('id-ID').format(price);
            },
            
            orderViaWhatsApp() {
                if (!this.selectedSize) return;
                
                const message = `Halo Admin Grosir Rizqi Barokah, saya ingin memesan ${this.productName} ukuran ${this.selectedSize}.`;
                const url = `https://api.whatsapp.com/send?phone=${this.waNumber}&text=${encodeURIComponent(message)}`;
                
                window.open(url, '_blank');
            }
        }
    }
</script>
@endsection
