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
                <a href="">
                    <button type="submit"
                        class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Register</button>
                </a>
                <a href="">
                    <button type="submit"
                        class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Login <i class="fa-solid fa-arrow-right"></i></button>
                </a>
            </div>
        </div>
    </div>
</nav>
