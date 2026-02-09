<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Categories Management') }}
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
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-2xl font-bold text-[#220901]">Category List</h3>
                            <p class="text-gray-600 mt-2">Manage your product categories</p>
                        </div>
                        <a href="{{ route('admin.categories.create') }}" class="bg-gradient-to-r from-[#f6aa1c] to-[#bc3908] hover:from-[#bc3908] hover:to-[#941b0c] text-white font-bold py-3 px-6 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 flex items-center group">
                            <div class="bg-white/20 rounded-lg p-1 mr-2 group-hover:bg-white/30 transition-colors">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <span>Add New Category</span>
                        </a>
                    </div>

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

                    <div class="overflow-x-auto rounded-xl border border-[#f6aa1c]/10">
                        <table class="min-w-full divide-y divide-[#f6aa1c]/20">
                            <thead class="bg-[#220901]/5">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Slug</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Products Count</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-[#220901] uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-[#f6aa1c]/10">
                                @forelse ($categories as $category)
                                <tr class="hover:bg-[#f6aa1c]/5 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[#220901]">{{ $category->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">{{ $category->slug }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 truncate max-w-xs" title="{{ $category->description }}">{{ Str::limit($category->description, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                            {{ $category->products_count ?? $category->products->count() }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('admin.categories.show', $category) }}" class="text-[#f6aa1c] hover:text-[#bc3908] transition-colors p-1 hover:bg-[#f6aa1c]/10 rounded-full" title="View">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 transition-colors p-1 hover:bg-blue-50 rounded-full" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category? All products in this category might be affected.')">
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
                                    <td colspan="6" class="px-6 py-10 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                            <p class="text-lg font-medium text-gray-900">No categories found</p>
                                            <p class="text-gray-500">Start simply by creating your first category.</p>
                                            <a href="{{ route('admin.categories.create') }}" class="mt-4 text-[#bc3908] hover:text-[#941b0c] font-medium hover:underline">
                                                Create First Category &rarr;
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($categories, 'links'))
                    <div class="mt-6">
                        {{ $categories->links() }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>