<aside class="fixed inset-y-0 left-0 bg-white w-72 flex flex-col shadow-xl border-r border-gray-100">
    <!-- Logo and Brand Header -->
    <div class="flex items-center justify-center h-20 border-b border-gray-100">
        <h1 class="text-2xl font-bold text-blue-600">FIT HUB <span class="text-gray-700">Admin</span></h1>
    </div>
    
    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        @php
            $navItems = [
                [
                    'route' => 'admin.dashboard',
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h3a1 1 0 001-1v-6a1 1 0 00-1-1h-3z"/></svg>',
                    'label' => 'Dashboard',
                ],
                [
                    'route' => 'admin.layanan',
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 100-12 6 6 0 000 12zm-1-7h2v2h-2V9zm0 4h2v2h-2v-2z"/></svg>',
                    'label' => 'Layanan',
                ],
                [
                    'route' => 'admin.member',
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>',
                    'label' => 'Member',
                ],
                [
                    'route' => 'admin.payment',
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>',
                    'label' => 'Payments',
                ],
            ];
        @endphp

        @foreach ($navItems as $item)
            <a href="{{ route($item['route']) }}" class="flex items-center px-4 py-3.5 text-base {{ request()->routeIs($item['route']) ? 'bg-blue-50 text-blue-600 font-medium border-l-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }} rounded-md transition-all duration-200 ease-in-out">
                <span class="mr-3">{!! $item['icon'] !!}</span>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <!-- Admin Info & Logout -->
    <div class="border-t border-gray-100 p-4 bg-gray-50">
        <div class="flex items-center space-x-3 mb-4 px-2">
            <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold uppercase">
                {{ substr(Auth::user()->name ?? 'Admin', 0, 1) }}
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Admin User' }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->email ?? 'admin@fithub.com' }}</p>
            </div>
        </div>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center space-x-2 px-4 py-2.5 rounded-md bg-white text-red-600 hover:bg-red-50 border border-gray-200 shadow-sm transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</aside>