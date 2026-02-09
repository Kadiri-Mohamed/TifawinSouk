<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Products Management') }}
            </h2>
            <div class="mt-2 md:mt-0">
                <span class="text-[#f6aa1c] text-sm bg-[#220901]/50 px-3 py-1 rounded-full">
                    Welcome back, {{ Auth::user()->name }}!
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden">
                <div class="p-8">
                    <!-- Header with Add Button -->
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-2xl font-bold text-[#220901]">Product List</h3>
                            <p class="text-gray-600 mt-2">Manage your product catalog</p>
                        </div>
                        <a href="{{ route('admin.products.create') }}" class="bg-gradient-to-r from-[#f6aa1c] to-[#bc3908] hover:from-[#bc3908] hover:to-[#941b0c] text-white font-bold py-3 px-6 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 flex items-center group">
                            <div class="bg-white/20 rounded-lg p-1 mr-2 group-hover:bg-white/30 transition-colors">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <span>Add New Product</span>
                        </a>
                    </div>

                    <!-- Alerts -->
                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                    @endif

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-xl border border-[#f6aa1c]/10">
                        <table class="min-w-full divide-y divide-[#f6aa1c]/20">
                            <thead class="bg-[#220901]/5">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Reference</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Stock</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-[#f6aa1c]/10">
                                @forelse ($products as $product)
                                <tr class="hover:bg-[#f6aa1c]/5 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($product->image_path)
                                        <img src="{{ asset('storage/' . $product->image_path) }}" class="h-12 w-12 rounded-lg object-cover shadow-sm border border-gray-200" alt="{{ $product->name }}">
                                        @else
                                        <div class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400 border border-gray-200">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[#220901]">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $product->reference }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-[#bc3908]">{{ number_format($product->price, 2) }} MAD</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $product->stock }} in stock
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        <span class="bg-gray-100 text-gray-600 py-1 px-3 rounded-md text-xs">
                                            {{ $product->category->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('admin.products.show', $product) }}" class="text-[#f6aa1c] hover:text-[#bc3908] transition-colors p-1 hover:bg-[#f6aa1c]/10 rounded-full" title="View">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800 transition-colors p-1 hover:bg-blue-50 rounded-full" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors p-1 hover:bg-red-50 rounded-full" title="Delete">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-10 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                            <p class="text-lg font-medium text-gray-900">No products found</p>
                                            <p class="text-gray-500">Get started by adding a new product to your inventory.</p>
                                            <a href="{{ route('admin.products.create') }}" class="mt-4 text-[#bc3908] hover:text-[#941b0c] font-medium hover:underline">
                                                Add First Product &rarr;
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>