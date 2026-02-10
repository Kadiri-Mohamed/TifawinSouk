<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Our Products') }}
            </h2>
            <div class="mt-2 md:mt-0">
                <span class="text-[#f6aa1c] text-sm bg-[#220901]/50 px-3 py-1 rounded-full">
                    {{ count($products) }} Products Available
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Category Filter -->
            <div class="mb-6 bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden p-6">
                <h3 class="text-lg font-bold text-[#220901] mb-4">Filter by Category</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('client.products.index') }}" 
                       class="px-4 py-2 rounded-lg font-semibold transition-all duration-300 bg-gradient-to-r from-[#f6aa1c] to-[#bc3908] text-white hover:from-[#bc3908] hover:to-[#941b0c] transform hover:scale-105">
                        All Products
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('client.products.index', ['category' => $category]) }}" 
                           class="px-4 py-2 rounded-lg font-semibold transition-all duration-300 bg-white text-[#220901] border border-[#f6aa1c]/30 hover:bg-[#f6aa1c] hover:text-white transform hover:scale-105">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Products Grid -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden">
                <div class="p-8">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-[#220901]">Product Catalog</h3>
                        <p class="text-gray-600 mt-2">Discover our amazing selection of products</p>
                    </div>

                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($products as $product)
                                <div class="bg-white rounded-xl shadow-md border border-[#f6aa1c]/20 overflow-hidden transform hover:scale-105 transition-all duration-300 hover:shadow-xl">
                                    <!-- Product Image -->
                                    <div class="relative h-48 bg-gray-100 overflow-hidden">
                                        @if($product->image_path)
                                            <img src="{{ asset('storage/' . $product->image_path) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                                <span class="text-gray-400 text-4xl">📦</span>
                                            </div>
                                        @endif
                                        
                                        <!-- Stock Badge -->
                                        @if($product->stock > 0)
                                            <span class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                                In Stock
                                            </span>
                                        @else
                                            <span class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                                Out of Stock
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Product Info -->
                                    <div class="p-4">
                                        <div class="mb-2">
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">
                                                {{ $product->category->name ?? 'Uncategorized' }}
                                            </span>
                                        </div>
                                        
                                        <h4 class="font-bold text-[#220901] text-lg mb-2 line-clamp-2">
                                            {{ $product->name }}
                                        </h4>
                                        
                                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                            {{ $product->description ?? 'No description available' }}
                                        </p>

                                        <div class="flex items-center justify-between mb-4">
                                            <span class="text-2xl font-bold text-[#bc3908]">
                                                {{ number_format($product->price, 2) }} MAD
                                            </span>
                                            <span class="text-xs text-gray-500">
                                                Stock: {{ $product->stock }}
                                            </span>
                                        </div>

                                        <!-- View Details Button -->
                                        <a href="{{ route('client.products.show', $product) }}" 
                                           class="block w-full text-center bg-gradient-to-r from-[#f6aa1c] to-[#bc3908] hover:from-[#bc3908] hover:to-[#941b0c] text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-16">
                            <div class="text-gray-300 mb-4 text-6xl">📦</div>
                            <p class="text-lg font-medium text-gray-900 mb-2">No products found</p>
                            <p class="text-gray-500">Check back later for new products!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
