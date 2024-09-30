<nav class="py-3 bg-zinc-100 dark:bg-zinc-900">
    <div class="container">
        <div class="flex items-center justify-between gap-32">
            <div>
                <a href="{{ route('home') }}">
                    <x-logo />
                </a>
            </div>
            <div class="flex-grow">
                <form action="" method="get" class="flex items-center">
                    <input type="text"
                        class="w-full rounded-s-lg bg-transparent border-[#703273] focus:border-[#703273] h-10 px-3 focus:outline-none focus:ring-0"
                        name="q" id="q" placeholder="Compare">
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
    </div>
</nav>
