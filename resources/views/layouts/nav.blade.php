<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title>Dashboard-Admin</title>
   <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
   <link href="css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/bootstrap.js') }}"></script>
   <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
   <script src="{{ asset('js/scripts.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="{{ asset('demo/chart-area-demo.js')}}"></script>
   <script src="{{ asset('demo/chart-bar-demo.js')}}"></script>
   <script src="{{ asset('demo/chart-pie-demo.js')}}"></script>
   <script src="{{ asset('demo/datatables-demo.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</head>


<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
   <!-- Navbar Brand-->
   <a class="navbar-brand ps-3" href="/home">
       <img width="120" height="35" src="/build/assets/images/yobalema.png" alt="logo">
   </a>
   <!-- Sidebar Toggle-->
   <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa-solid fa-eye"></i></button>
   <!-- Navbar-->
   <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

       <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
           <!-- Primary Navigation Menu -->
           <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
               <div class="flex justify-between h-16">
                   <!-- Settings Dropdown -->
                   <div class="hidden sm:flex sm:items-center sm:ms-6">
                       <x-dropdown align="right" width="48">
                           <x-slot name="trigger">
                               <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                   <div>{{ Auth::user()->name }}</div>
                                   <span>Options</span>
                                   <div class="ms-1">
                                       <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                           <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                       </svg>
                                   </div>
                               </button>
                           </x-slot>
       
                           <x-slot name="content">
                                
                               <x-dropdown-link :href="route('profile.edit')">
                                   <button class="btn btn-outline-info">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                           <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                           <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                       </svg>
                                       {{ __('Profile') }}
                                   </button>
                               </x-dropdown-link>
       
                               <!-- Authentication -->
                               <form method="POST" action="{{ route('logout') }}">
                                   @csrf
       
                                   <x-dropdown-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                                       this.closest('form').submit();">
                                       <button class="btn btn-outline-danger">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                               <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                               <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                           </svg>
                                           {{ __('Deconnexion') }}
                                       </button>
                                   </x-dropdown-link>
                               </form>
                           </x-slot>
                       </x-dropdown>
                   </div>
       
                   <!-- Hamburger -->
                   <div class="-me-2 flex items-center sm:hidden">
                       <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
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
                   <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                       {{ __('Dashboard') }}
                   </x-responsive-nav-link>
               </div>
       
               <!-- Responsive Settings Options -->
               <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                   <div class="px-4">
                       <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                       <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                   </div>
       
                   <div class="mt-3 space-y-1">
                       <x-responsive-nav-link :href="route('profile.edit')">
                           {{ __('Profile') }}
                       </x-responsive-nav-link>
       
                       <!-- Authentication -->
                       <form method="POST" action="{{ route('logout') }}">
                           @csrf
       
                           <x-responsive-nav-link :href="route('logout')"
                                   onclick="event.preventDefault();
                                               this.closest('form').submit();">
                               {{ __('Log Out') }}
                           </x-responsive-nav-link>
                       </form>
                   </div>
               </div>
           </div>
       </nav>
   </ul>
</nav>