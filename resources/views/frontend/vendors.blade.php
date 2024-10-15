<x-frontend-layout :PageTitle="'Vendors'">

    {{-- Carousel --}}
    <section class="">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative overflow-hidden h-[200px] md:h-[400px] lg:h-[500px] xl:h-[550px]">
                @foreach ($carousels as $carousel)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset(Storage::url($carousel->image)) }}"
                            class="absolute block h-[200px] md:h-[400px] lg:h-[500px] xl:h-[550px] w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2""
                            alt="Carousel Image">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
                @foreach ($carousels as $index => $carousel)
                    <button type="button" class="w-3 h-3 rounded-full"
                        aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ ++$index }}"
                        data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

    </section>


    {{-- featured Stores --}}

    <section class="py-10">
        <div class="container space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-3xl text-[#703273] font-semibold">Vendor Stores</p>
                    <p class="text-xl italic">Find Stores Near Your Location</p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                @if (count($vendors) > 0)
                    @foreach ($vendors as $vendor)
                        <a
                            href="{{ route('vendor-product', [Str::slug($vendor->vendor_stores[0]->name ?? 'store', '-'), $vendor->id]) }}">
                            <div class="overflow-hidden duration-200 border rounded-md cursor-pointer hover:shadow-lg">
                                <div>
                                    <img class="h-[200px] w-full object-cover"
                                        src="{{ asset(Storage::url($vendor->vendor_stores[0]->featured_image)) }}"
                                        alt="">
                                </div>
                                <div class="px-3 py-2">
                                    <h2 class="text-xl font-semibold text-[#703273]">
                                        {{ $vendor->vendor_stores[0]->name ?? 'Store Name' }}
                                        ({{ $vendor->products->where('status', '1')->count() }})
                                    </h2>
                                    <p>{{ $vendor->vendor_stores[0]->address ?? 'Store Address' }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>

        </div>
    </section>
</x-frontend-layout>
