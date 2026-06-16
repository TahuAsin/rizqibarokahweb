<nav class="bg-[#fdfbf7] sticky top-0 z-50 border-b-4 border-[#1b3b22] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-3 group">
                    <!-- Image Logo (Upload logo.png ke folder public) -->
                    <img src="{{ asset('logo.png') }}" alt="Logo Rizqi Barokah" class="h-[130px] md:h-[170px] -my-[45px] w-auto object-contain relative z-50 transition duration-300 group-hover:scale-105 drop-shadow-md">
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
            </div>
        </div>
    </div>
</nav>
