<x-app-layout>
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            {{-- Header Section --}}
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">Product List</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your product inventory</p>
                </div>
                @can('manage-products')
                    <x-add-product :url="route('product.create')" :name="'Product'"/>
                @endcan
            </div>

            {{-- Notifications --}}
            @if (session('success'))
                <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl flex items-center gap-3 animate-fade-in">
                    <div class="p-2 bg-emerald-500/20 rounded-lg text-emerald-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="text-emerald-400 font-medium">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Table Card --}}
            <div class="rounded-3xl shadow-2xl overflow-hidden shadow-black/50" style="background-color: #131520; border: 1px solid rgba(255,255,255,0.05);">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" style="table-layout: fixed;">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/5">
                                <th class="px-8 py-5 text-sm font-semibold text-slate-400 uppercase tracking-wider w-20" style="text-align: left;">#</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-400 uppercase tracking-wider" style="text-align: left;">Name</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-400 uppercase tracking-wider" style="text-align: left;">Quantity</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-400 uppercase tracking-wider" style="text-align: left;">Price</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-400 uppercase tracking-wider" style="text-align: left;">Owner</th>
                                <th class="px-8 py-5 text-sm font-semibold text-slate-400 uppercase tracking-wider" style="text-align: left;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse ($products as $product)
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="px-8 py-6 text-slate-500 font-medium" style="text-align: left;">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-8 py-6" style="text-align: left;">
                                        <div class="text-white font-semibold text-lg">
                                            {{ $product->name }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6" style="text-align: left;">
                                        @php
                                            $isLowStock = $product->qty < 10;
                                        @endphp
                                        <div class="inline-flex items-center text-sm font-bold tracking-wide
                                            {{ $isLowStock ? 'text-red-500' : 'text-emerald-500' }}">
                                            <span class="w-2 h-2 rounded-full mr-2 {{ $isLowStock ? 'bg-red-500 animate-pulse' : 'bg-emerald-500' }}"></span>
                                            {{ $product->qty }} {{ $isLowStock ? '(Low Stock)' : '' }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6" style="text-align: left;">
                                        <div class="text-white font-bold tabular-nums flex items-center gap-2">
                                            <span class="text-slate-500 font-medium">Rp</span>
                                            <span>{{ number_format($product->price, 0, ',', '.') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6" style="text-align: left;">
                                        <div class="flex items-center gap-3">
                                            <span class="text-slate-400">{{ $product->user->name ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6" style="text-align: left;">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('product.show', $product->id) }}"
                                               class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white transition-all border border-white/5"
                                               title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                               class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-amber-400 transition-all border border-white/5"
                                               title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-lg bg-white/5 text-slate-400 hover:text-red-500 transition-all border border-white/5" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-8 py-32 text-center">
                                        <div class="flex flex-col items-center opacity-30">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <span class="text-2xl font-bold tracking-tight">No products cataloged</span>
                                            <p class="mt-2 text-slate-400">Add your first product to see it here.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
