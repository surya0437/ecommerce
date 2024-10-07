<nav class="sticky top-0 z-50 py-3 bg-zinc-100 dark:bg-zinc-900">
    <div class="container">
        <div class="items-center justify-between hidden gap-32 lg:flex">
            <div>
                <a href="{{ route('home') }}">
                    <x-logo />
                </a>
            </div>
            <div class="flex-grow">
                <form action="{{ route('compare') }}" method="get" class="flex items-center">
                    <input type="text"
                        class="w-full rounded-s-lg bg-transparent border-[#703273] focus:border-[#703273] h-10 px-3 focus:outline-none focus:ring-0"
                        name="q" id="q" placeholder="{{ $random_product }}">
                    <button type="submit"
                        class="text-white font-bold px-4 rounded-e-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Compare</button>
                </form>

            </div>
            <div>

                @if (Auth::check() && Auth::guard('web')->user())
                    <a href="{{ route('dashboard') }}">
                        <button type="submit" class="h-16 px-4 text-[#703273] rounded-lg"><i
                                class="fa-solid fa-cart-plus"></i></button>
                    </a>

                    <a href="{{ route('dashboard') }}">
                        <button type="submit" class="h-16 px-4 text-black rounded-lg"><i
                                class="fa-solid fa-user"></i></button>
                    </a>
                @else
                    <a href="{{ route('register') }}">
                        <button type="submit"
                            class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Register</button>
                    </a>
                    <a href="{{ route('login') }}">
                        <button type="submit"
                            class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Login <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </a>
                @endif
            </div>
        </div>


        <div class="flex items-center justify-between lg:hidden">
            <div>
                <a href="{{ route('home') }}">
                    <x-logo />
                </a>
            </div>
            <div>
                <button class="h-16 px-4 text-[#703273] hover:text-[#8d3391] text-2xl rounded-lg"type="button"
                    data-drawer-target="sidenav" data-drawer-show="sidenav" aria-controls="sidenav">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>


        <div id="sidenav"
            class="fixed top-0 left-0 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white z-[500] w-80 dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-label">
            <a href="{{ route('home') }}">
                <x-logo />
            </a>
            <button type="button" data-drawer-hide="sidenav" aria-controls="sidenav"
                class=" bg-transparent text-[#703273] hover:text-[#8d3391] rounded-lg text-2xl w-16 h-16 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>

            <div class="mt-3">
                <form action="{{ route('compare') }}" method="get" class="flex items-center">
                    <input type="text"
                        class="w-full rounded-s-lg bg-transparent border-[#703273] focus:border-[#703273] h-10 px-3 focus:outline-none focus:ring-0"
                        name="q" id="q" placeholder="{{ $random_product  }}                  <button type="submit"
                        class="text-white font-bold px-4 rounded-e-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Compare</button>
                </form>
            </div>
            <div class="flex items-center justify-between mt-2">
                @if (Auth::check() && Auth::guard('web')->user())
                    <a href="{{ route('dashboard') }}">
                        <button type="submit" class="h-16 px-4 text-[#703273] rounded-lg"><i
                                class="fa-solid fa-cart-plus"></i></button>
                    </a>

                    <a href="{{ route('dashboard') }}">
                        <button type="submit" class="h-16 px-4 text-black rounded-lg"><i
                                class="fa-solid fa-user"></i></button>
                    </a>
                @else
                    <a href="{{ route('register') }}">
                        <button type="submit"
                            class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Register</button>
                    </a>
                    <a href="{{ route('login') }}">
                        <button type="submit"
                            class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Login <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </a>
                @endif
            </div>
        </div>

    </div>
</nav>
