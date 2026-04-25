<x-app-layout>
    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-[#0f111a] min-h-screen" style="background-color: #0f111a;">
        <div class="max-w-7xl mx-auto">
            {{-- Welcome Header --}}
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-white tracking-tight">Dashboard Overview</h1>
                <p class="text-slate-500 mt-2">Welcome back, <span class="text-indigo-400 font-bold">{{ Auth::user()->name }}</span>! Here's what's happening today.</p>
            </div>

            {{-- Role Info --}}
            <div class="mb-8 rounded-2xl p-6 shadow-xl flex items-center gap-4" style="background-color: #131520; border: 1px solid rgba(255,255,255,0.05);">
                <div class="text-sm font-bold text-slate-400 uppercase tracking-widest">
                    Role: <span class="text-indigo-400 ml-2">{{ ucfirst(Auth::user()->role) }}</span>
                </div>
            </div>

            {{-- Stats Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                {{-- Total Products Card --}}
                <div class="rounded-2xl p-6 shadow-2xl transition-all hover:scale-[1.02]" style="background-color: #131520; border: 1px solid rgba(255,255,255,0.05);">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-indigo-500/10 rounded-xl text-indigo-500 border border-indigo-500/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7m16 0l-8 4-8-4"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Total Products</p>
                            <h3 class="text-2xl font-black text-white tabular-nums">{{ $totalProducts }}</h3>
                        </div>
                    </div>
                </div>

                {{-- Low Stock Card --}}
                <div class="rounded-2xl p-6 shadow-2xl transition-all hover:scale-[1.02]" style="background-color: #131520; border: 1px solid rgba(255,255,255,0.05);">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-red-500/10 rounded-xl text-red-500 border border-red-500/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Low Stock Items</p>
                            <h3 class="text-2xl font-black text-white tabular-nums">{{ $lowStockCount }}</h3>
                        </div>
                    </div>
                </div>

                {{-- Status Card --}}
                <div class="rounded-2xl p-6 shadow-2xl transition-all hover:scale-[1.02]" style="background-color: #131520; border: 1px solid rgba(255,255,255,0.05);">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-emerald-500/10 rounded-xl text-emerald-500 border border-emerald-500/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">System Status</p>
                            <h3 class="text-xl font-bold text-white uppercase tracking-tight">Active</h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Action Section --}}
            <div class="rounded-[2.5rem] overflow-hidden shadow-2xl" style="background-color: #131520; border: 1px solid rgba(255,255,255,0.05);">
                <div class="p-12 text-center md:text-left md:flex items-center justify-between gap-10">
                    <div class="max-w-xl">
                        <h2 class="text-3xl font-bold text-white tracking-tight mb-4">Efisiensi Inventaris Anda</h2>
                        <p class="text-slate-400 text-lg leading-relaxed">Kelola semua produk Anda dengan satu klik. Tambah barang baru, pantau stok yang menipis, dan lihat laporan harga dengan desain yang modern.</p>
                        <div class="mt-8 flex flex-wrap justify-center md:justify-start gap-4">
                            <a href="{{ route('product.create') }}" 
                               class="px-8 py-4 text-white font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-indigo-500/20 active:scale-95 flex items-center gap-2"
                               style="background-color: #4f46e5;">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Add New Product
                            </a>
                            <a href="{{ route('product.index') }}" 
                               class="px-8 py-4 text-slate-300 hover:text-white font-bold rounded-xl transition-all duration-300 border border-white/5 hover:bg-white/5 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                Manage Catalog
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-64 h-64 bg-indigo-500/10 rounded-full flex items-center justify-center border border-indigo-500/5 animate-pulse">
                            <svg class="w-32 h-32 text-indigo-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
