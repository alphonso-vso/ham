<div class="text-slate-600 body-font overflow-hidden">
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        @auth
        
        @else
        <a href="{{ route('login') }}" class="font-semibold text-slate-600 hover:text-slate-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesión</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-slate-600 hover:text-slate-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrar</a>
        @endif
        @endauth
    </div>
    @endif
    <div class="container px-5 xl:py-24 md:py-24 sm:py-6 mx-auto">
        <div class="flex flex-wrap -m-4">

            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#128522;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Lunes</span>
                    </h1>
                    @foreach ($datosL as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->platillo }}
                    </p>
                    @endforeach
                    @auth
                    <button wire:click="confirmRecordAddL" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endauth
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>

            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#128521;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Martes</span>
                    </h1>
                    @foreach ($datosM as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->platillo }}
                    </p>
                    @endforeach
                    @auth
                    <button wire:click="confirmRecordAddM" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endauth
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>

            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#128512;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Miércoles</span>
                    </h1>
                    @foreach ($datosK as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->platillo }}
                    </p>
                    @endforeach
                    @auth
                    <button wire:click="confirmRecordAddK" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endauth
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>

            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#128516;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Jueves</span>
                    </h1>
                    @foreach ($datosJ as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->platillo }}
                    </p>
                    @endforeach
                    @auth
                    <button wire:click="confirmRecordAddJ" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endauth
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>

            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#128526;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Viernes</span>
                    </h1>
                    @foreach ($datosV as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->platillo }}
                    </p>
                    @endforeach
                    @auth
                    <button wire:click="confirmRecordAddV" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endauth
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>

            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#128578;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Sábado</span>
                    </h1>
                    @foreach ($datosS as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->platillo }}
                    </p>
                    @endforeach
                    @auth
                    <button wire:click="confirmRecordAddS" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    @else
                    <a href="{{ route('login') }}" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endauth
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>

            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#128579;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Domingo</span>
                    </h1>
                    @foreach ($datosD as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->platillo }}
                    </p>
                    @endforeach
                    <button wire:click="confirmRecordAddD" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>



            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full bg-white p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                    <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">&#127852;</span>
                    <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Día</h2>
                    <h1 class="text-5xl text-slate-900 leading-none flex items-center pb-4 mb-4 border-b border-slate-200">
                        <span>Otros</span>
                    </h1>
                    @foreach ($datosO as $dato)
                    <p class="flex items-center text-slate-600 mb-2">
                        <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-slate-400 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        </span>{{ $dato->nombre }}
                    </p>
                    @endforeach
                    <button wire:click="confirmRecordAddO" class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">Ordenar
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    <p class="text-xs text-slate-500 mt-3">Literally you probably haven't heard of them jean shorts.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Lunes -->
    <x-dialog-modal wire:model="confirmingRecordAddL">
        <x-slot name="title">
            {{ isset($this->l->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="l.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsL) > 0)
                    @foreach ($recordsL as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="l.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="l.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddL', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordL({{ $confirmingRecordAddL }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Martes -->
    <x-dialog-modal wire:model="confirmingRecordAddM">
        <x-slot name="title">
            {{ isset($this->m->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="m.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsM) > 0)
                    @foreach ($recordsM as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="m.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="m.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddM', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordM({{ $confirmingRecordAddM }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Miércoles -->
    <x-dialog-modal wire:model="confirmingRecordAddK">
        <x-slot name="title">
            {{ isset($this->k->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="k.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsK) > 0)
                    @foreach ($recordsK as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="k.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="k.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddK', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordK({{ $confirmingRecordAddK }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Jueves -->
    <x-dialog-modal wire:model="confirmingRecordAddJ">
        <x-slot name="title">
            {{ isset($this->j->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="j.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsJ) > 0)
                    @foreach ($recordsJ as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="j.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="j.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddJ', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordJ({{ $confirmingRecordAddJ }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Viernes -->
    <x-dialog-modal wire:model="confirmingRecordAddV">
        <x-slot name="title">
            {{ isset($this->v->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="v.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsV) > 0)
                    @foreach ($recordsV as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="v.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="v.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddV', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordV({{ $confirmingRecordAddV }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Sábado -->
    <x-dialog-modal wire:model="confirmingRecordAddS">
        <x-slot name="title">
            {{ isset($this->s->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="s.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsS) > 0)
                    @foreach ($recordsS as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="s.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="s.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddS', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordS({{ $confirmingRecordAddS }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Domingo -->
    <x-dialog-modal wire:model="confirmingRecordAddD">
        <x-slot name="title">
            {{ isset($this->d->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="d.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsD) > 0)
                    @foreach ($recordsD as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="d.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="d.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddD', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordD({{ $confirmingRecordAddD }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Otros -->
    <x-dialog-modal wire:model="confirmingRecordAddO">
        <x-slot name="title">
            {{ isset($this->d->id) ? 'Editar registro' : 'Agregar registro' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_platillo" value="{{ __('Orden de') }}" />
                <select wire:model.defer="o.id_platillo" id="id_platillo" class="mt-1 block w-full border-slate-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                    <option value="">{{ __('Selecciona un opción') }}</option>
                    @if(count($recordsO) > 0)
                    @foreach ($recordsO as $pid => $nombre)
                    <option value="{{ $pid }}">{{ $nombre }}</option>
                    @endforeach
                    @endif
                </select>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                    <x-input id="cantidad" type="number" min="1" class="mt-1 block w-full" wire:model.defer="o.cantidad" value="1" />
                    <x-input-error for="cantidad" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="adicionales" value="{{ __('Adicionales') }}" />
                    <x-input id="adicionales" type="number" min="0" class="mt-1 block w-full" wire:model.defer="o.adicionales" value="0" />
                    <x-input-error for="adicionales" class="mt-2" />
                </div>
                <x-input-error for="id_platillo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingRecordAddO', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveRecordO({{ $confirmingRecordAddO }})" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

</div>