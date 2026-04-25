<x-app-layout>
    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-[#0f111a] min-h-screen" style="background-color: #0f111a;">
        <div class="max-w-xl mx-auto">
            {{-- Header with Back Arrow and Components --}}
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('product.index') }}" class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white transition-colors border border-white/5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <div class="flex-1">
                    <h1 class="text-2xl font-bold text-white tracking-tight">Product Detail</h1>
                    <p class="text-slate-500 text-sm">Viewing product #{{ $product->id }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('product.edit', $product->id) }}" class="p-2 rounded-lg bg-white/5 text-amber-500 hover:bg-amber-500/10 transition-all border border-amber-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded-lg bg-white/5 text-red-500 hover:bg-red-500/10 transition-all border border-red-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="rounded-2xl shadow-2xl overflow-hidden" style="background-color: #131520; border: 1px solid rgba(255,255,255,0.05);">
                <div class="p-8">
                    {{-- Detail List --}}
                    <div class="space-y-6">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Product Name</span>
                            <div class="text-xl font-semibold text-white">{{ $product->name }}</div>
                        </div>

                        <div class="space-y-1 pt-4 border-t border-white/5">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Category</span>
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full bg-indigo-500/20 text-indigo-400 text-xs font-bold border border-indigo-500/20">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-8 pt-4 border-t border-white/5">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Quantity</span>
                                <div class="text-lg font-bold text-emerald-500">
                                    {{ $product->quantity }}
                                </div>
                            </div>

                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Price</span>
                                <div class="text-lg font-bold text-white tabular-nums">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1 pt-4 border-t border-white/5">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Owner</span>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-indigo-500/20 flex items-center justify-center text-[10px] font-bold text-indigo-400 border border-indigo-500/20">
                                    {{ substr($product->user->name ?? '?', 0, 1) }}
                                </div>
                                <span class="text-slate-300 text-sm">{{ $product->user->name ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="space-y-1 pt-4 border-t border-white/5">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Created At</span>
                            <div class="text-white text-sm">{{ $product->created_at->format('d M Y, H:i') }}</div>
                        </div>

                        <div class="space-y-1 pt-4 border-t border-white/5">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Updated At</span>
                            <div class="text-white text-sm">{{ $product->updated_at->format('d M Y, H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
