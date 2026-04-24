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
                    <x-edit-button :url="route('product.edit', $product->id)" />
                    <x-delete-button :url="route('product.delete', $product->id)" />
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

                        <div class="grid grid-cols-2 gap-8 pt-4 border-t border-white/5">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Quantity</span>
                                @php $isLowStock = $product->qty < 10; @endphp
                                <div class="flex items-center gap-2">
                                    <div class="text-lg font-bold {{ $isLowStock ? 'text-red-500' : 'text-emerald-500' }}">
                                        {{ $product->qty }} {{ $isLowStock ? 'Low Stock' : 'In Stock' }}
                                    </div>
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
