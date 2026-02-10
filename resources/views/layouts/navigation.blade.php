<nav x-data="{ open: false }"
    class="bg-gradient-to-r from-[#220901] to-[#941b0c] shadow-xl border-b-2 border-[#f6aa1c]/30">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-lg flex items-center justify-center shadow-lg">
                                <span class="text-[#220901] font-bold text-xl">TS</span>
                            </div>
                            <span class="text-white font-bold text-xl tracking-wider">TifawinSouk</span>
                        </a>
                    @else
                        <a href="{{ route('client.products.index') }}" class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-lg flex items-center justify-center shadow-lg">
                                <span class="text-[#220901] font-bold text-xl">TS</span>
                            </div>
                            <span class="text-white font-bold text-xl tracking-wider">TifawinSouk</span>
                        </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                @if(auth()->user()->role == 'admin')
                        <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                class="!text-white hover:!bg-[#f6aa1c]/20">
                                {{ __('Dashboard') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')"
                                class="!text-white hover:!bg-[#f6aa1c]/20">
                                {{ __('Products') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.categories.index')"
                                :active="request()->routeIs('admin.categories.*')" class="!text-white hover:!bg-[#f6aa1c]/20">
                                {{ __('Categories') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.suppliers.index')" :active="request()->routeIs('admin.suppliers.*')"
                                class="!text-white hover:!bg-[#f6aa1c]/20">
                                {{ __('Suppliers') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')"
                                class="!text-white hover:!bg-[#f6aa1c]/20">
                                {{ __('Orders') }}
                            </x-nav-link>
                        </div>
                    </div>
                @else
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('client.products.index')" :active="request()->routeIs('home')"
                        class="!text-white hover:!bg-[#f6aa1c]/20">
                        {{ __('Home') }}
                    </x-nav-link>
               </div>
            @endif
            <!-- Settings Dropdown -->
            @if(auth()->user()->role == 'admin')
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-[#f6aa1c]/30 text-sm leading-4 font-medium rounded-lg text-white bg-[#bc3908]/20 hover:bg-[#bc3908]/30 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex items-center space-x-2">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-full flex items-center justify-center">
                                        <span
                                            class="text-[#220901] font-bold text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    </div>
                                    <div>{{ Auth::user()->name }}</div>
                                </div>

                                <div class="ms-2">
                                    <svg class="fill-current h-4 w-4 text-[#f6aa1c]" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="hover:!bg-[#f6aa1c]/10">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-[#941b0c]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>{{ __('Profile') }}</span>
                                </div>
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                    class="hover:!bg-red-100 hover:!text-red-700">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>{{ __('Log Out') }}</span>
                                    </div>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-[#f6aa1c]/30 text-sm leading-4 font-medium rounded-lg text-white bg-[#bc3908]/20 hover:bg-[#bc3908]/30 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex items-center space-x-2">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-full flex items-center justify-center">
                                        <span
                                            class="text-[#220901] font-bold text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    </div>
                                    <div>{{ Auth::user()->name }}</div>
                                </div>

                                <div class="ms-2">
                                    <svg class="fill-current h-4 w-4 text-[#f6aa1c]" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="hover:!bg-[#f6aa1c]/10">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-[#941b0c]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>{{ __('Profile') }}</span>
                                </div>
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                    class="hover:!bg-red-100 hover:!text-red-700">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>{{ __('Log Out') }}</span>
                                    </div>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>

                </div>
            @endif


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-lg text-[#f6aa1c] hover:text-white hover:bg-[#bc3908]/20 focus:outline-none focus:bg-[#bc3908]/20 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden bg-gradient-to-b from-[#220901] to-[#941b0c]">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="!text-white hover:!bg-[#f6aa1c]/20">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.products.index')"
                :active="request()->routeIs('admin.products.*')" class="!text-white hover:!bg-[#f6aa1c]/20">
                {{ __('Products') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.categories.index')"
                :active="request()->routeIs('admin.categories.*')" class="!text-white hover:!bg-[#f6aa1c]/20">
                {{ __('Categories') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.suppliers.index')"
                :active="request()->routeIs('admin.suppliers.*')" class="!text-white hover:!bg-[#f6aa1c]/20">
                {{ __('Suppliers') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')"
                class="!text-white hover:!bg-[#f6aa1c]/20">
                {{ __('Orders') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#f6aa1c]/30">
            <div class="px-4">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-[#f6aa1c] to-[#bc3908] rounded-full flex items-center justify-center">
                        <span class="text-[#220901] font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                    <div>
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-[#f6aa1c]">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="!text-white hover:!bg-[#f6aa1c]/20">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="!text-red-300 hover:!bg-red-500/20">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>