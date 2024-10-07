@props(['product'])

<div class="relative w-full duration-200 single-card card-style-one hover:shadow-lg" data-modal-target="card-model-{{ $product->id }}"
    data-modal-toggle="card-model-{{ $product->id }}" type="button">
    {{-- <a href="/login"> --}}
        <div class="flex">
            <div class="relative h-24 p-0 card-image w-36">
                <img src="{{ asset(Storage::url($product->image)) }}" alt="Image"
                    class="object-contain w-full h-full p-2">
                <!-- Discount Badge -->
                @if ($product->discount_percentage > 0)
                    <div class="absolute px-2 py-1 text-xs font-bold text-white bg-red-600 rounded top-2 left-2">
                        {{ $product->discount_percentage }}% OFF
                    </div>
                @endif

            </div>
            <div class="flex-1 p-2 card-body">
                <h5 class="text-2xl card-title">{{ $product->name }}</h5>
                @if ($product->discount_percentage > 0)
                    @php
                        $price = $product->price - ($product->price * $product->discount_percentage) / 100;
                    @endphp
                    <div class="flex gap-6">
                        <p class="text"><span class="text-sm"><s>Rs.{{ $product->price }}</s></span>
                        <p class="text"><span class="text-sm">Rs.{{ $price }}</span>
                    </div>
                @else
                    <p class="text"><span class="text-sm">Rs.{{ $product->price }}</span>
                @endif
                </p>
                <div class="text-sm">Paachthare Nembang Fresh house</div>
            </div>
        </div>
    {{-- </a> --}}
</div>


  <div id="card-model-{{ $product->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[1000] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative w-full max-w-2xl p-4 bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal content -->
        <div class="relative">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Product Details
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="card-model-{{ $product->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <img src="{{ asset(Storage::url($product->image)) }}" alt="{{ $product->name }}" class="w-full h-auto">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ $product->description }}
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="card-model-{{ $product->id }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">Close</button>
            </div>
        </div>
    </div>
</div>
