<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="/js/alpine.js" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <livewire:styles />
</head>

<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="bg-blue-900 shadow mb-8 py-6">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div x-data="{open: false}" class="flex-5 text-right p-1 flex-row">
                        @guest
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        @else
                        <span class="text-gray-300 text-sm pr-4"><button @click="open = true">{{ Auth::user()->name }}</button></span>

                        <div x-show="open" @click.away="open = false" class="rounded shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="{{ route('logout') }}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <ul>

                            @endguest
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex flex-1">
            <aside id="sidebar" class="bg-gray-200 w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-gray-500 hover:bg-white {{ (request()->routeIs('admin.index')) ? 'bg-white' : '' }}">
                        <a href="{{route('admin.index')}}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2 font-bold"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-gray-500 hover:bg-white {{ (request()->routeIs('admin.services.index')) ? 'bg-white' : '' }}">
                        <a href="{{route('admin.services.index')}}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Services
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-gray-500 hover:bg-white {{ (request()->routeIs('admin.services.types')) ? 'bg-white' : '' }}">
                        <a href="{{route('admin.services.types')}}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            Service Types
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-gray-500 hover:bg-white {{ (request()->routeIs('admin.services.options')) ? 'bg-white' : '' }}">
                        <a href="{{route('admin.services.options')}}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Options
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-gray-500 hover:bg-white {{ (request()->routeIs('complains.index')) ? 'bg-white' : '' }}">
                        <a href="{{route('complains.index')}}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Complains
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-gray-500 hover:bg-white {{ (request()->routeIs('complains.index')) ? 'bg-white' : '' }}">
                        <a href="{{url('admin/user-management/user')}}" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Users
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                </ul>
                </li>
                </ul>

            </aside>
            @yield('content')
        </div>


    </div>

    <!-- Scripts -->
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
    <livewire:scripts />
    @stack('scripts')
</body>

</html>