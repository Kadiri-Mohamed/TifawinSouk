<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Dashboard Overview') }}
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
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Products Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 p-6 transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Products</p>
                            <p class="text-3xl font-bold text-[#220901] mt-2">1,254</p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#220901]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 p-6 transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Active Orders</p>
                            <p class="text-3xl font-bold text-[#220901] mt-2"><!-- orders number --></p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-[#bc3908] to-[#941b0c] rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                
                </div>

                <!-- Revenue Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 p-6 transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Revenue</p>
                            <p class="text-3xl font-bold text-[#220901] mt-2"><!--Revenus--></p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-[#941b0c] to-[#621708] rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                   
                </div>

                <!-- Customers Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 p-6 transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Customers</p>
                            <p class="text-3xl font-bold text-[#220901] mt-2"> <!-- Customers number --></p>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-[#621708] to-[#220901] rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-[#f6aa1c]/20 overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-full mb-4">
                            <svg class="w-10 h-10 text-[#220901]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 01118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-[#220901]">Welcome to TifawinSouk Admin</h3>
                        <p class="text-gray-600 mt-2">Manage your e-commerce store efficiently</p>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <a href="{{ route('admin.products.index') }}" class="bg-gradient-to-r from-[#f6aa1c]/10 to-[#bc3908]/10 rounded-xl p-6 border border-[#f6aa1c]/30 hover:border-[#bc3908] transition-all duration-300 group hover:shadow-lg">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-[#220901]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#220901] group-hover:text-[#941b0c]">Manage Products</h4>
                                    <p class="text-sm text-gray-600 mt-1">Add, edit, or remove products</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.orders.index') }}" class="bg-gradient-to-r from-[#bc3908]/10 to-[#941b0c]/10 rounded-xl p-6 border border-[#bc3908]/30 hover:border-[#941b0c] transition-all duration-300 group hover:shadow-lg">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#bc3908] to-[#941b0c] rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#220901] group-hover:text-[#941b0c]">View Orders</h4>
                                    <p class="text-sm text-gray-600 mt-1">Track and manage orders</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.categories.index') }}" class="bg-gradient-to-r from-[#941b0c]/10 to-[#621708]/10 rounded-xl p-6 border border-[#941b0c]/30 hover:border-[#621708] transition-all duration-300 group hover:shadow-lg">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#941b0c] to-[#621708] rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#220901] group-hover:text-[#941b0c]">Categories</h4>
                                    <p class="text-sm text-gray-600 mt-1">Organize your products</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-gradient-to-r from-[#220901]/5 to-[#941b0c]/5 rounded-xl p-6 border border-[#220901]/10">
                        <h4 class="font-bold text-[#220901] mb-4">Recent Activity</h4>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-[#f6aa1c]/20">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-[#220901]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">New product added: "Traditional Moroccan Rug"</span>
                                </div>
                                <span class="text-sm text-gray-500">2 hours ago</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-[#f6aa1c]/20">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#bc3908] to-[#941b0c] rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">Order #ORD-7894 marked as shipped</span>
                                </div>
                                <span class="text-sm text-gray-500">4 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>