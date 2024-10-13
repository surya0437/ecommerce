<x-frontend-layout :PageTitle="'Vendor Product'">
    <section>
        <div class="relative overflow-hidden">
            <img src="{{ asset(Storage::url($vendor->vendor_stores[0]->featured_image)) }}" alt=""
                class="object-cover w-full md:h-[500px] xl:h-[600px]">

            <div class="absolute w-full bg-[#000000bd] bottom-10">
                <div class="container flex items-center gap-10">
                    <img src="{{ asset(Storage::url($vendor->vendor_stores[0]->featured_image)) }}" alt=""
                        class="w-24 h-24">
                    <div>
                        <h2 class="text-xl font-semibold text-white">{{ $vendor->vendor_stores[0]->name }}
                            ({{ $vendor->products->where('status', '1')->count() }})
                        </h2>
                        <p class="text-white">{{ $vendor->vendor_stores[0]->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-10">
            <div class="sticky z-20 flex flex-wrap">
                <!-- Menus -->
                <div class="w-full p-4 lg:w-1/5 md:w-1/4">
                    <h5><i class="fab fa-mendeley" style="color: #703273"></i> Featured</h5>
                    <ul class="py-4">


                        <li class="px-2 border-b bg-light">
                            <a href="/vendor/121" class="text-lg font-bold text-dark">
                                Featured Items
                            </a>
                        </li>
                        <li class="px-2 border-b bg-light">
                            <a href="/vendor/121?deal=discount" class="nav-link">
                                <span class="text-lg text-gray-500">Special Deals</span>
                                <span class="px-2 text-white bg-red-600 rounded-full">Offers</span>
                            </a>
                        </li>
                        @foreach ($vendor->products as $product)
                            @if ($product->discount_percentage > 0)
                                <li class="px-2 border-b bg-light">
                                    <a href="/vendor/121?deal=discount" class="nav-link">
                                        <span class="text-lg text-gray-500">{{ $product->name }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>

                <div class="w-full mt-4 lg:w-4/5 md:w-3/4 md:mt-0">
                    <div class="flex flex-wrap">

                        <form
                            action="{{ route('vendor-product', [Str::slug($vendor->vendor_stores[0]->name ?? 'store', '-'), $vendor->id]) }}"
                            method="get" class="flex w-full mb-4">
                            <input type="text"
                                class="w-full rounded-s-lg bg-transparent border-[#703273] focus:border-[#703273] h-10 px-3 focus:outline-none focus:ring-0"
                                name="search" id="search" placeholder="Search Product by Name">
                            <button type="submit"
                                class="text-white font-bold px-4 rounded-e-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Search</button>
                        </form>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

                            @foreach ($vendor->products as $product)
                                <x-product-card :product="$product" />
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
