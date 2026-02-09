<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Edit Product') }}
            </h2>
            <div class="mt-2 md:mt-0">
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-white text-sm font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Products
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden">
                <div class="p-8">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-[#220901]">Edit Product Details</h3>
                        <p class="text-gray-600 mt-2">Update the information for product: <span class="font-semibold">{{ $product->name }}</span></p>
                    </div>

                    @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                        <strong class="font-bold">Whoops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700"
                                    placeholder="Enter product name">
                            </div>

                            
                            <div>
                                <label for="reference" class="block text-sm font-medium text-gray-700 mb-1">Reference Code</label>
                                <input type="text" name="reference" id="reference" value="{{ old('reference', $product->reference) }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700 font-mono"
                                    placeholder="e.g. PRD-001">
                            </div>
                        </div>

                        
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700"
                                placeholder="Describe the product...">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price (MAD)</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm">DH</span>
                                    </div>
                                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required
                                        class="block w-full rounded-lg border-gray-300 pl-10 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm text-gray-700"
                                        placeholder="0.00">
                                </div>
                            </div>

                            
                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0" required
                                    class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700"
                                    placeholder="0">
                            </div>

                            
                            <div>
                                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                                @if($product->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="Current Image" class="h-16 w-16 object-cover rounded-md border border-gray-200">
                                    <p class="text-xs text-gray-500 mt-1">Current image</p>
                                </div>
                                @endif
                                <input type="file" name="image_path" id="image_path" accept="image/*"
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-[#f6aa1c]/10 file:text-[#bc3908]
                                    hover:file:bg-[#f6aa1c]/20
                                    cursor-pointer">
                                <p class="text-xs text-gray-500 mt-1">Leave blank to keep current image</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select name="category_id" id="category_id" required
                                    class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            
                            <div>
                                <label for="supplier_id" class="block text-sm font-medium text-gray-700 mb-1">Supplier</label>
                                <select name="supplier_id" id="supplier_id" required
                                    class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700">
                                    <option value="">Select a Supplier</option>
                                    @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->first_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-6 border-t border-gray-200 mt-6">
                            <a href="{{ route('admin.products.index') }}" class="mr-4 text-gray-600 hover:text-gray-800 font-medium">Cancel</a>
                            <button type="submit" class="bg-gradient-to-r from-[#f6aa1c] to-[#bc3908] hover:from-[#bc3908] hover:to-[#941b0c] text-white font-bold py-3 px-8 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>