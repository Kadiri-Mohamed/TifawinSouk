<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Category Details') }}
            </h2>
            <div class="mt-2 md:mt-0 flex space-x-2">
                <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center px-4 py-2 bg-[#f6aa1c] hover:bg-[#d68c0b] border border-transparent rounded-lg text-[#220901] text-sm font-bold shadow-sm transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Category
                </a>
                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-white text-sm font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
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
                        <div class="w-full space-y-6">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                                <div>
                                    <h3 class="text-3xl font-bold text-[#220901]">{{ $category->name }}</h3>
                                    <p class="text-sm font-mono text-gray-500 mt-1">Slug: {{ $category->slug }}</p>
                                </div>
                                <div class="bg-blue-50 text-blue-800 px-4 py-2 rounded-lg text-sm font-medium">
                                    ID: {{ $category->id }}
                                </div>
                            </div>

                            <div class="prose prose-sm max-w-none text-gray-600">
                                <h4 class="text-lg font-semibold text-[#220901] mb-2">Description</h4>
                                <p class="leading-relaxed whitespace-pre-line">{{ $category->description ?: 'No description available.' }}</p>
                            </div>

                            <div class="pt-6 border-t border-gray-100 text-xs text-gray-400 flex justify-between">
                                <span>Created: {{ $category->created_at ? $category->created_at->format('M d, Y H:i') : 'N/A' }}</span>
                                <span>Last Updated: {{ $category->updated_at ? $category->updated_at->format('M d, Y H:i') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white/50 rounded-xl shadow border border-red-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-medium text-red-800">Delete Category</h4>
                        <p class="text-sm text-gray-500 mt-1">Deleting this category might affect products associated with it. Please be certain.</p>
                    </div>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-700 font-semibold py-2 px-4 rounded-lg border border-red-200 transition-colors">
                            Delete Category
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>