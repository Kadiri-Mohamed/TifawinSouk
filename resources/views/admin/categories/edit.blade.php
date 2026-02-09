<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Edit Category') }}
            </h2>
            <div class="mt-2 md:mt-0">
                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-white text-sm font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Categories
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden">
                <div class="p-8">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-[#220901]">Edit Category</h3>
                        <p class="text-gray-600 mt-2">Update information for category: <span class="font-semibold">{{ $category->name }}</span></p>
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

                    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700"
                                    placeholder="e.g. Traditional Rugs">
                            </div>

                            <div>
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700 font-mono bg-gray-50"
                                    placeholder="e.g. traditional-rugs">
                                <p class="text-xs text-gray-500 mt-1">Leave blank to auto-generate from name.</p>
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full rounded-lg border-gray-300 focus:border-[#f6aa1c] focus:ring-[#f6aa1c] shadow-sm transition-colors text-gray-700"
                                placeholder="Describe the category...">{{ old('description', $category->description) }}</textarea>
                        </div>

                        <div class="flex items-center justify-end pt-6 border-t border-gray-200 mt-6">
                            <a href="{{ route('admin.categories.index') }}" class="mr-4 text-gray-600 hover:text-gray-800 font-medium">Cancel</a>
                            <button type="submit" class="bg-gradient-to-r from-[#f6aa1c] to-[#bc3908] hover:from-[#bc3908] hover:to-[#941b0c] text-white font-bold py-3 px-8 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>