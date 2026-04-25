<x-app-layout>
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl mx-auto">
            <div class="rounded-3xl shadow-2xl overflow-hidden shadow-black/50 p-8" style="background-color: #1a1c2a; border: 1px solid rgba(255,255,255,0.05);">
                <div class="mb-8 flex items-center gap-4">
                    <a href="{{ route('product.index') }}" class="text-gray-400 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-2xl font-bold text-white tracking-tight">Edit Product</h2>
                        <p class="text-sm text-gray-400 mt-1">Update the details of your product</p>
                    </div>
                </div>

                <form action="{{ route('product.update', $product->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    {{-- Nama Produk --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-400 mb-2">Nama Produk</label>
                        <input type="text" name="name" id="name" required
                               class="w-full bg-[#131520] border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all"
                               style="background-color: #131520 !important; color: white !important;"
                               placeholder="e.g. Wireless Headphones"
                               value="{{ old('name', $product->name) }}">
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-400 mb-2">Kategori</label>
                        <select name="category_id" id="category_id" required
                                class="w-full bg-[#131520] border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all appearance-none"
                                style="background-color: #131520 !important; color: white !important;">
                            <option value="" class="bg-[#131520] text-white">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="bg-[#131520] text-white" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Quantity --}}
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-400 mb-2">Quantity</label>
                            <input type="text" name="quantity" id="quantity" required
                                   class="w-full bg-[#131520] border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all"
                                   style="background-color: #131520 !important; color: white !important;"
                                   placeholder="0"
                                   value="{{ old('quantity', $product->quantity) }}">
                            @error('quantity')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-400 mb-2">Price (Rp)</label>
                            <input type="number" name="price" id="price" required step="0.01"
                                   class="w-full bg-[#131520] border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all"
                                   style="background-color: #131520 !important; color: white !important;"
                                   placeholder="0"
                                   value="{{ old('price', $product->price) }}">
                            @error('price')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('product.index') }}" 
                           class="px-6 py-2.5 bg-white/5 hover:bg-white/10 text-white font-semibold rounded-xl transition-all border border-white/10">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-xl transition-all shadow-lg shadow-amber-600/20">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
