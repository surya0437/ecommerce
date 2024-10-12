<x-frontend-layout>

    <section>
        <div class="container py-10 mx-auto">
            <div class="flex flex-col gap-6 p-5 bg-white rounded-lg shadow-lg md:flex-row">

                <div class="flex-shrink-0">
                    <img src="{{ asset(Storage::url($single_product->image)) }}" alt="Product Image"
                        class="w-full rounded-lg md:w-64">
                </div>
                <form action="{{ route('cart-store') }}" method="post">
                    @csrf
                    <input type="text" name="product_id" id="" hidden value="{{ $single_product->id }}">
                    <div class="flex-grow">
                        <h2 class="text-2xl font-bold text-[#703273] mb-3">{{ $single_product->name }}</h2>

                        @if ($single_product->discount_percentage > 0)
                            <span
                                class="inline-block px-2 py-1 mb-3 text-xs font-bold text-white bg-red-500 rounded-full">
                                {{ $single_product->discount_percentage }}% OFF
                            </span>
                        @endif

                        <div class="flex items-center gap-4 mb-4">
                            @if ($single_product->discount_percentage > 0)
                                @php
                                    $price =
                                        $single_product->price -
                                        ($single_product->price * $single_product->discount_percentage) / 100;
                                @endphp
                                <span class="text-lg text-gray-500 line-through">NRs.
                                    {{ $single_product->price }}</span>

                                <span class="text-xl font-bold text-[#703273]">NRs. {{ $price }}</span>
                            @else
                                <span class="text-lg text-gray-500 line-through">NRs.
                                    {{ $single_product->price }}</span>
                            @endif
                        </div>

                        <div class="flex items-center gap-4 mb-4">
                            <label for="quantity" class="text-gray-700">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1"
                                class="w-20 rounded-md bg-transparent border-[#703273] focus:border-[#703273] h-10 px-3 focus:outline-none focus:ring-0">
                            @error('quantity')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>

                        <button
                            class="bg-[#703273] text-white px-6 py-3 rounded-lg hover:bg-[#8d3391] transition duration-300">
                            Add to Cart
                        </button>

                        {{-- <p class="mt-4 text-gray-600">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at sagittis eros, non sodales turpis.
                    </p> --}}
                    </div>
                </form>
            </div>
            
        </div>

    </section>

    <section class="mb-5">
        <div class="container py-5">
            <div class="flex items-center justify-between mb-5">
                <p class="text-2xl text-[#703273] font-semibold">
                    More Products
                </p>
            </div>
            <div class="sticky z-20 flex flex-wrap">

                <div class="w-full mt-4 md:mt-0">
                    <div class="flex flex-wrap">

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

                            @foreach ($products as $product)
                                <x-product-card :product="$product" />
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-frontend-layout>
