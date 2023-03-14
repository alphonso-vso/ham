<nav x-data="{ open: false }" class="bg-white border-b border-slate-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('menu') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                        {{ __('Menu') }}
                    </x-nav-link>
                    @role('super-admin')
                    <x-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('tiempos') }}" :active="request()->routeIs('tiempos')">
                        {{ __('Tiempos') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('adicionales') }}" :active="request()->routeIs('adicionales')">
                        {{ __('Adicionales') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('dias') }}" :active="request()->routeIs('dias')">
                        {{ __('Días') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('platillos') }}" :active="request()->routeIs('platillos')">
                        {{ __('Platillos') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('platillos-dia') }}" :active="request()->routeIs('platillos-dia')">
                        {{ __('Platillos x Día') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('ordenes') }}" :active="request()->routeIs('ordenes')">
                        {{ __('Ordenes') }}
                    </x-nav-link>
                    @endrole
                    <x-nav-link href="{{ route('facturas') }}" :active="request()->routeIs('facturas')">
                        {{ __('Facturas') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('control') }}" :active="request()->routeIs('control')">
                        {{ __('Control') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-slate-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-slate-500 bg-white hover:text-slate-700 focus:outline-none focus:bg-slate-50 active:bg-slate-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-slate-400">
                                {{ __('Administrar cuenta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-slate-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Salir') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-slate-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('menu') }}" :active="request()->routeIs('menu')">
                {{ __('Menú') }}
            </x-responsive-nav-link>
            @role('super-admin')
            <x-responsive-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('tiempos') }}" :active="request()->routeIs('tiempos')">
                {{ __('Tiempos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('adicionales') }}" :active="request()->routeIs('adicionales')">
                {{ __('Adicionales') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('dias') }}" :active="request()->routeIs('dias')">
                {{ __('Dias') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('platillos') }}" :active="request()->routeIs('platillos')">
                {{ __('Platillos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('platillos-dia') }}" :active="request()->routeIs('platillos-dia')">
                {{ __('Platillos X Día') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('ordenes') }}" :active="request()->routeIs('ordenes')">
                {{ __('Ordenes') }}
            </x-responsive-nav-link>
            @endrole
            <x-responsive-nav-link href="{{ route('facturas') }}" :active="request()->routeIs('facturas')">
                {{ __('Facturas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('control') }}" :active="request()->routeIs('control')">
                {{ __('Control') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-slate-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Salir') }}
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>
    </div>
</nav>
