<x-frontend-layout :PageTitle="'Home'">

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
                    <p class="text-3xl text-[#703273] font-semibold">Features Stores</p>
                    <p class="text-xl italic">Find Stores Near Your Location</p>
                </div>
                <div>
                    <a href="" class="hover:text-[#8d3391]">
                        View All <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                @foreach ($vendors as $vendor)
                <a href="{{ route('vendor-product', [Str::slug($vendor->vendor_stores[0]->name ?? 'store', '-'), $vendor->id]) }}">
                    <div class="overflow-hidden duration-200 border rounded-md cursor-pointer hover:shadow-lg">
                        <div>
                            <img class="h-[200px] w-full object-cover"
                                src="{{ asset(Storage::url($vendor->vendor_stores[0]->featured_image)) }}" alt="">
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

            </div>

        </div>
    </section>

    {{-- Vendor Request  --}}

    <section class="py-10">
        <div class="container">
            <div>
                <h3 class="w-2/3 mx-auto text-3xl text-center text-gray-700 dark:text-white">
                    List your Restaurant or Store at BazzarX Market Pvt. Ltd.! Reach 1,00,000 + new customers.
                </h3>


                <!-- Modal toggle -->
                <button data-modal-target="send-request-modal" data-modal-toggle="send-request-modal"
                    class="block text-white bg-[#703273] hover:bg-[#8d3391] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#703273] dark:hover:bg-[#703273] dark:focus:ring-[#8d3391] mx-auto mt-8"
                    type="button">
                    SEND A REQUEST
                </button>
            </div>

            <!-- Main modal -->
            <div id="send-request-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-[#703273] dark:text-[#703273]">
                                Send a Request
                            </h3>
                            <button type="button"
                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="send-request-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="#703273" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" fill="#703273" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 space-y-4 md:p-5">
                            <form action="{{ route('vendor-create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="name">Name <span class="text-red-700">*</span></label>
                                        <input type="text" name="name" id="name"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="email">Email <span class="text-red-700">*</span></label>
                                        <input type="email" name="email" id="email"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone">Phone <span class="text-red-700">*</span></label>
                                        <input type="text" name="phone" id="phone"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="vendor_name">Vendor Name <span
                                                class="text-red-700">*</span></label>
                                        <input type="text" name="vendor_name" id="vendor_name"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('vendor_name') }}">
                                        @error('vendor_name')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="vendor_address">Vendor Address <span
                                                class="text-red-700">*</span></label>
                                        <input type="text" name="vendor_address" id="vendor_address"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('vendor_address') }}">
                                        @error('vendor_address')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-4">
                                    <button type="submit"
                                        class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Send
                                        Request</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

{{ $random_product = null ? 'Product Name' : $random_product }}

</x-frontend-layout>
