<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    @php
        $classWidth='max-w-7xl';
        if (request()->is('shop*')){
            $classWidth="w-full";
        }
        else{
            $classWidth = 'max-w-7xl';
        }
    @endphp 

    <div class="{{$classWidth}} mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @if (request()->is('shop*'))
                    <a href="{{ route('shop.index') }}">
                        <img src="{{ Storage::url('shop/Webshop-logo.png') }}" class="h-14" >
                    </a>
                    

                    @else
                    <a href="{{ route('index') }}">
                        <img src="{{ Storage::url('me.png') }}" class="rounded-full h-9" >
                    </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (request()->is('gallery*'))
                        <x-jet-nav-link href="{{ route('gallery.index') }}" :active="request()->routeIs('gallery.index')">
                            {{ __('Home Gallery') }}
                        </x-jet-nav-link>
                        
                        <x-jet-nav-link href="{{ route('gallery.new') }}" :active="request()->routeIs('gallery.new')">
                            {{ __('Create new Gallery') }}
                        </x-jet-nav-link>
                    @elseif (request()->is('shop*'))
                        <x-jet-nav-link href="{{ route('shop.index') }}" :active="request()->routeIs('shop.index')">
                            {{ __('Home') }}
                        </x-jet-nav-link>     
                        <x-jet-nav-link href="javascript:void(0)" :active="request()->routeIs('shop.index')" class="pr-3">
                            {{ __('Lieferadresse') }}
                        </x-jet-nav-link>    
                        <div >
                            <div class="absolute -ml-[135px] mt-16 z-10 bg-white rounded border border-slate-300 py-2 shadow-xl sm:rounded-lg">    
                            @foreach(session('deliveryAddress') as $address)
                                <div class="hover:bg-slate-200 px-4 py-1 cursor-pointer">
                                {{ $address->address}},&nbsp;
                                {{ $address->postal_area}},&nbsp;
                                {{ $address->city}}
                                </div>
                            @endforeach
                            </div>
                        </div>                                                
                        
                    @else 
                        <x-jet-nav-link href="{{ route('gallery.index') }}" :active="request()->routeIs('gallery.index')">
                            {{ __('Home Else') }}
                        </x-jet-nav-link>
                    @endif
                </div>
            </div>
            
            @if (request()->is('shop*'))
            <div class="w-4/5 mt-2 p-2">
                <form id="frmShopSearch" method="POST" action="{{ route("shop.search")}}" >
                    @csrf
                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <input type="text" name="search" placeholder="Suche" class="px-3 py-2 placeholder-slate-700 text-slate-600 relative bg-white bg-white rounded text-sm border border-slate-300 outline-none w-full"/>
                        <button onclick="$('#frmShopSearch').submit()" 
                            class="z-10 h-full font-normal absolute bg-slate-200 
                                   text-center text-slate-300 absolute  rounded w-12
                                   text-base items-center justify-center  right-0 px-3 py-2 ">
                        <i class="fas fa-search"></i>
                        </button>
                    </div> 
                </form>      
            </div>
            @endif

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Shop Divs -->
                @if (request()->is('shop*'))
                
                    @if (!Auth::user())
                        <div id="logon" onclick="$('#logon_div').toggle()" class="cursor-pointer p-3  border-l border-slate-200 h-full flex justify-center items-center ">
                            <div class="w-[200px] ">
                                <span class="text-xs">
                                <i class="text-amber-500 fa-solid fa-user"></i>
                                Hello - Melde dich an!
                                </span><br> 
                                <span class="text-xs font-bold">Konto & Listen</span>
                            </div>
                        </div>
                    @else
                        <div id="logged_in" onclick="$('#logout_div').toggle()" class="p-3 border-l border-slate-200 h-full flex justify-center items-center ">
                            <div class="w-[200px]">
                                <div>{{Auth::user()->name}}</div>
                                <div class="font-bold text-amber-500 text-xs"><a href="#">Logout</a>
                            </div>        
                        </div>    
                    @endif
                    <div id="logon_div" class="hidden z-3 absolute w-25 rounded-lg top-20 bg-slate-200 border border-slate-500 p-3">
                        <form id="frmLogon" action="{{ route("login") }}" method="POST"> 
                        @csrf    
                        <input type="text" name="email"><br>
                        <input type="password" name="password"><br>
                        <input type="hidden" name="gobackto" value="shop.index">
                        <button type="submit">Login</button>
                        </form>
                    </div>
                    <div id="logout_div" class="hidden z-3 absolute w-25 rounded-lg top-20 bg-slate-200 border border-slate-500 p-3">
                        <form id="frmLogout" action="{{ route("logout") }}" method="POST"> 
                        @csrf    
                        <input type="hidden" name="gobackto" value="shop.index">
                        <button type="submit">Logout</button>
                        </form>
                    </div>

                    <div id="cart" class="p-3 border-l border-slate-200  h-full flex justify-center items-center ">
                        <a href="{{ route("shop.showcart") }}">
                            <i class="text-amber-500 fa-solid fa-cart-shopping mr-2"></i> 
                        </a>
                        <a href="{{ route("shop.showcart") }}"> Warenkorb </a> &nbsp; 
                        <a href="{{ route("shop.showcart") }}">
                            <span id="wk_cnt" class="text-amber-500 font-bold"> ({{ Session::get('cartItemsCnt',0)}})
                        </a>    
                    </div>            
                @endif
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user() && !(request()->is('shop*')))
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->

                                    @if (Auth::user()) 
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                    
                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan
                                            
                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    @endif    
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::user() && !(request()->is('shop*')))
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                @if (Auth::user() && !(request()->is('shop*')))
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
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
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
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
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::user())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                
                @endif
                @if (Auth::user())
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && Auth::user())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
