@props(['product'])

<div class="relative w-full duration-200 single-card card-style-one hover:shadow-lg">
    <a href="{{ route('cart_page', $product->id) }}">
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
    </a>
</div>

