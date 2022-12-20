<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}">

       <title>{{ config('app.name', 'In A Sell') }}</title>

       <!-- Fonts -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <style>
            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568; 			/*text-gray-700*/
                padding-left: 1rem; 		/*pl-4*/
                padding-right: 1rem; 		/*pl-4*/
                padding-top: .5rem; 		/*pl-2*/
                padding-bottom: .5rem; 		/*pl-2*/
                line-height: 1.25; 			/*leading-tight*/
                border-width: 2px; 			/*border-2*/
                border-radius: .25rem; 		
                border-color: #edf2f7; 		/*border-gray-200*/
                background-color: #edf2f7; 	/*bg-gray-200*/
            }
            /*Row Hover*/
            table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;	/*bg-indigo-100*/
            }
            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button		{
                font-weight: 700;				/*font-bold*/
                border-radius: .25rem;			/*rounded*/
                border: 1px solid transparent;	/*border border-transparent*/
            }
            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
                color: #fff !important;				/*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
                font-weight: 700;					/*font-bold*/
                border-radius: .25rem;				/*rounded*/
                background: #667eea !important;		/*bg-indigo-500*/
                border: 1px solid transparent;		/*border border-transparent*/
            }
            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
                color: #fff !important;				/*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
                font-weight: 700;					/*font-bold*/
                border-radius: .25rem;				/*rounded*/
                background: #667eea !important;		/*bg-indigo-500*/
                border: 1px solid transparent;		/*border border-transparent*/
            }
            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }
            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #667eea !important; /*bg-indigo-500*/
            }
        </style>
         
         <!-- Scripts -->
         <script src="{{ asset('js/app.js') }}" defer></script>
         <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
         <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
         <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
   </head>
   <body>
        <!-- Page Content -->
        <!-- page -->
        <main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
            <!-- header page -->
            <header class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2" style="height: 15vh">
                <!-- logo -->
                <div class="flex items-center space-x-2">
                    <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu"></i></button>
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto mx-3" />
                    </a>
                </div>

                <!-- button profile -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>                
            </header>

            <div class="flex">
                <!-- aside -->
                <aside class="flex w-52 min-h-screen h-screen flex-col space-y-2 border-r-2 border-gray-200 bg-white p-4"
                    x-show="asideOpen">
                    <x-jet-nav-link href="{{ route('dashboard.shop.index') }}" class="flex space-x-2 text-2xl">
                        <iconify-icon icon="material-symbols:home-outline-rounded"></iconify-icon>
                        <p class="text-base">{{ __('Dashboard') }}</p>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('dashboard.shop.index') }}" :active="request()->routeIs('dashboard.shop.show',  request()->shop)" class="flex space-x-2 text-2xl">
                        <iconify-icon icon="mdi:shop-outline"></iconify-icon>
                        <p class="text-base">{{ __('Shop') }}</p>
                    </x-jet-nav-link>
                    @if (!is_null(request()->shop))
                    <x-jet-nav-link href="{{ route('dashboard.shop.productcategory.index', ['shop'=>request()->shop]) }}" :active="request()->routeIs('dashboard.shop.productcategory.index', ['shop'=>request()->shop])" class="flex space-x-2 text-2xl">
                        <iconify-icon icon="bx:category-alt"></iconify-icon>
                        <p class="text-base">{{ __('Category') }}</p>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('dashboard.shop.product.index', ['shop'=>request()->shop]) }}" :active="request()->routeIs('dashboard.shop.product.index', ['shop'=>request()->shop])" class="flex space-x-2 text-2xl">
                        <iconify-icon icon="gridicons:product"></iconify-icon>
                        <p class="text-base">{{ __('Product') }}</p>
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('dashboard.shop.order.index', ['shop'=>request()->shop]) }}" :active="request()->routeIs('dashboard.shop.order.index', ['shop'=>request()->shop])" class="flex space-x-2 text-2xl">
                        <iconify-icon icon="mdi:order-bool-descending-variant"></iconify-icon>
                        <p class="text-base">{{ __('Order') }}</p>
                    </x-jet-nav-link>                        
                    @endif

                </aside>

                <!-- main content page -->
                <div class="w-full p-4 m-4 antialiased">
                    {{ $slot }}
                </div>
            </div>
        </main>

        @stack('modals')

        @livewireScripts
        {{ $script ?? '' }}
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("layout", () => ({
                    profileOpen: false,
                    asideOpen: true,
                }));
            });
        </script>
    </body>
</html>
