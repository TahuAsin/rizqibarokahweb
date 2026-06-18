<nav x-data="{ mobileMenuOpen: false }" class="bg-[#fdfbf7] sticky top-0 z-50 border-b-4 border-[#1b3b22] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-3 group">
                    <img src="{{ asset('logo.png') }}" alt="Logo Rizqi Barokah" class="h-[60px] md:h-[80px] w-auto object-contain relative z-50 transition duration-300 group-hover:scale-105 drop-shadow-sm">
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 mt-1">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-b-[3px] border-[#b8860b] text-[#1b3b22]' : 'text-[#3e2723] hover:text-[#1b3b22] border-b-[3px] border-transparent hover:border-[#b8860b]' }} px-1 py-2 text-sm font-bold tracking-wider uppercase transition font-serif">Beranda</a>
                <a href="{{ route('katalog.index') }}" class="{{ request()->routeIs('katalog.*') ? 'border-b-[3px] border-[#b8860b] text-[#1b3b22]' : 'text-[#3e2723] hover:text-[#1b3b22] border-b-[3px] border-transparent hover:border-[#b8860b]' }} px-1 py-2 text-sm font-bold tracking-wider uppercase transition font-serif">Katalog</a>
                <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'border-b-[3px] border-[#b8860b] text-[#1b3b22]' : 'text-[#3e2723] hover:text-[#1b3b22] border-b-[3px] border-transparent hover:border-[#b8860b]' }} px-1 py-2 text-sm font-bold tracking-wider uppercase transition font-serif">Kontak</a>
            </div>

            <!-- Icons -->
            <div class="flex items-center text-[#3e2723]">
                <form action="{{ route('katalog.index') }}" method="GET" class="relative hidden sm:block group">
                    <input type="text" name="search" placeholder="Cari..." class="w-0 opacity-0 group-hover:w-48 group-hover:opacity-100 transition-all duration-300 absolute right-8 -top-2 py-1 px-3 border-b border-[#b8860b] focus:outline-none bg-transparent text-sm text-[#1b3b22] font-serif placeholder-[#5d4037]">
                    <button type="submit" class="hover:text-[#1b3b22] transition mt-1">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden ml-4 p-1 text-[#3e2723] hover:text-[#1b3b22] focus:outline-none">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" style="display: none;" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         style="display: none;"
         class="md:hidden bg-[#fdfbf7] border-t border-[#b8860b]/30 shadow-inner">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded-md text-base font-bold font-serif uppercase tracking-wider {{ request()->routeIs('home') ? 'bg-[#1b3b22]/10 text-[#1b3b22]' : 'text-[#3e2723] hover:bg-[#1b3b22]/5 hover:text-[#1b3b22]' }}">Beranda</a>
            <a href="{{ route('katalog.index') }}" class="block px-4 py-3 rounded-md text-base font-bold font-serif uppercase tracking-wider {{ request()->routeIs('katalog.*') ? 'bg-[#1b3b22]/10 text-[#1b3b22]' : 'text-[#3e2723] hover:bg-[#1b3b22]/5 hover:text-[#1b3b22]' }}">Katalog</a>
            <a href="{{ route('kontak') }}" class="block px-4 py-3 rounded-md text-base font-bold font-serif uppercase tracking-wider {{ request()->routeIs('kontak') ? 'bg-[#1b3b22]/10 text-[#1b3b22]' : 'text-[#3e2723] hover:bg-[#1b3b22]/5 hover:text-[#1b3b22]' }}">Kontak</a>
            
            <!-- Mobile Search -->
            <div class="mt-4 px-1 pt-2">
                <form action="{{ route('katalog.index') }}" method="GET" class="relative">
                    <input type="text" name="search" placeholder="Cari produk..." class="w-full py-2.5 px-4 bg-white border border-[#b8860b]/50 rounded-full focus:outline-none focus:border-[#1b3b22] text-sm text-[#1b3b22] font-serif placeholder-[#5d4037] shadow-sm">
                    <button type="submit" class="absolute right-4 top-2.5 text-[#b8860b] hover:text-[#1b3b22] transition">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
