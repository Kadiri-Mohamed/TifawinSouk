<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ $product->name }}
            </h2>
            <div class="mt-2 md:mt-0">
                <a href="{{ route('client.products.index') }}" 
                   class="text-[#f6aa1c] hover:text-white text-sm bg-[#220901]/50 px-3 py-1 rounded-full transition-colors duration-300">
                    ← Back to Products
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden">
                <div class="p-8">
                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Product Image -->
                        <div class="space-y-4">
                            <div class="rounded-xl overflow-hidden border-2 border-[#f6aa1c]/30 shadow-lg">
                                @if($product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-96 object-cover">
                                @else
                                    <div class="w-full h-96 flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                        <span class="text-gray-400 text-9xl">📦</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="space-y-6">
                            <!-- Category Badge -->
                            <div>
                                <span class="inline-block bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-sm font-semibold">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </div>

                            <!-- Product Name -->
                            <div>
                                <h1 class="text-3xl font-bold text-[#220901] mb-2">{{ $product->name }}</h1>
                                <p class="text-sm text-gray-500 font-mono">REF: {{ $product->reference }}</p>
                            </div>

                            <!-- Price -->
                            <div class="bg-gradient-to-r from-[#f6aa1c]/10 to-[#bc3908]/10 rounded-lg p-4 border border-[#f6aa1c]/30">
                                <p class="text-sm text-gray-600 mb-1">Price</p>
                                <p class="text-4xl font-bold text-[#bc3908]">{{ number_format($product->price, 2) }} MAD</p>
                            </div>

                            <!-- Stock Status -->
                            <div class="flex items-center space-x-3">
                                <span class="text-sm font-semibold text-gray-700">Availability:</span>
                                @if($product->stock > 10)
                                    <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-bold">
                                        ✓ In Stock ({{ $product->stock }} available)
                                    </span>
                                @elseif($product->stock > 0)
                                    <span class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full text-sm font-bold">
                                        ⚠ Low Stock ({{ $product->stock }} left)
                                    </span>
                                @else
                                    <span class="px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-bold">
                                        ✗ Out of Stock
                                    </span>
                                @endif
                            </div>

                            <!-- Description -->
                            <div class="bg-white rounded-lg p-6 border border-[#f6aa1c]/20">
                                <h3 class="text-lg font-bold text-[#220901] mb-3">Product Description</h3>
                                <p class="text-gray-700 leading-relaxed">
                                    {{ $product->description ?? 'No description available for this product.' }}
                                </p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                @if($product->stock > 0)
                                    <button class="w-full bg-gradient-to-r from-[#f6aa1c] to-[#bc3908] hover:from-[#bc3908] hover:to-[#941b0c] text-white font-bold py-4 px-6 rounded-xl shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center justify-center group">
                                        <div class="bg-white/20 rounded-lg p-2 mr-3 group-hover:bg-white/30 transition-colors">
                                            🛒
                                        </div>
                                        <span class="text-lg">Add to Cart</span>
                                    </button>
                                @else
                                    <button disabled class="w-full bg-gray-300 text-gray-500 font-bold py-4 px-6 rounded-xl cursor-not-allowed">
                                        Out of Stock
                                    </button>
                                @endif

                                <a href="{{ route('client.products.index') }}" 
                                   class="block w-full text-center bg-white hover:bg-gray-50 text-[#220901] font-bold py-3 px-6 rounded-xl border-2 border-[#f6aa1c] transition-all duration-300 transform hover:scale-105">
                                    Continue Shopping
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
