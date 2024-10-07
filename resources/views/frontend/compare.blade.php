<x-frontend-layout>
    <section>
        <div class="container py-5">
            <div class="flex items-center justify-between mb-5">
                <p class="text-2xl text-[#703273] font-semibold">
                    <span>Comparing</span>
                    <span class="text-red-600">{{ $products->count() }} Products</span>
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
