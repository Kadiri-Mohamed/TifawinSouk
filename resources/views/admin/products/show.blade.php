<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Product Details') }}
            </h2>
            <div class="mt-2 md:mt-0 flex space-x-2">
                <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-[#f6aa1c] hover:bg-[#d68c0b] border border-transparent rounded-lg text-[#220901] text-sm font-bold shadow-sm transition-colors">
                    Edit Product
                </a>
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-white text-sm font-medium transition-colors">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Image -->
                        <div class="w-full md:w-1/3">
                            <div class="aspect-w-1 aspect-h-1 w-full bg-gray-100 rounded-lg overflow-hidden border border-gray-200 shadow-sm relative group">
                                @if($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="object-cover w-full h-full transform transition-transform duration-500 group-hover:scale-105">
                                @else
                                <div class="flex items-center justify-center h-full w-full bg-gray-50 text-gray-400">
                                    <span class="text-sm font-medium">No Image</span>
                                </div>
                                @endif
                                <div class="absolute top-2 right-2">
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full shadow-sm {{ $product->stock > 10 ? 'bg-green-100 text-green-800 border border-green-200' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : 'bg-red-100 text-red-800 border border-red-200') }}">
                                        {{ $product->stock > 0 ? ($product->stock . ' In Stock') : 'Out of Stock' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="w-full md:w-2/3 space-y-6">
                            <div>
                                <h3 class="text-3xl font-bold text-[#220901]">{{ $product->name }}</h3>
                                <p class="text-sm font-mono text-gray-500 mt-1">Ref: {{ $product->reference }}</p>
                            </div>

                            <div class="flex items-center space-x-4">
                                <span class="text-3xl font-bold text-[#bc3908]">{{ number_format($product->price, 2) }} MAD</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-100">
                                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block mb-1">Category</span>
                                    <span class="text-gray-900 font-medium">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-100">
                                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block mb-1">Supplier</span>
                                    <span class="text-gray-900 font-medium">{{ $product->supplier->name ?? 'Unknown Supplier' }}</span>
                                </div>
                            </div>

                            <div class="prose prose-sm max-w-none text-gray-600">
                                <h4 class="text-lg font-semibold text-[#220901] mb-2">Description</h4>
                                <p class="leading-relaxed whitespace-pre-line">{{ $product->description ?: 'No description available for this product.' }}</p>
                            </div>


                            <div class="pt-6 border-t border-gray-100 text-xs text-gray-400 flex justify-between">
                                <span>Created: {{ $product->created_at->format('M d, Y H:i') }}</span>
                                <span>Last Updated: {{ $product->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="mt-8 bg-white/50 rounded-xl shadow border border-red-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-medium text-red-800">Delete Product</h4>
                        <p class="text-sm text-gray-500 mt-1">Once you delete a product, there is no going back. Please be certain.</p>
                    </div>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-700 font-semibold py-2 px-4 rounded-lg border border-red-200 transition-colors">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>