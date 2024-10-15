<x-app-layout :PageTitle="'Cart'">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Items in your cart</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($carts) > 0)
                                    @php
                                        $total = 0;
                                        $discount = 0;
                                        $subtotal = 0;
                                    @endphp
                                    @foreach ($carts as $index => $cart)
                                        @php
                                            $total += $cart->product->price * $cart->quantity;
                                            $discount +=
                                                ($cart->product->price * $cart->product->discount_percentage) / 100;
                                            // $subtotal += $cart->price;
                                        @endphp

                                        <tr>
                                            <td>
                                                {{ ++$index }}
                                            </td>
                                            <td>
                                                <img alt="image"
                                                    src="{{ asset(Storage::url($cart->product->image)) }}"
                                                    width="80">
                                            </td>

                                            <td>{{ $cart->product->name }}</td>

                                            <td>{{ $cart->product->price }}/-</td>

                                            <td>{{ $cart->product->discount_percentage }} %</td>

                                            <td class="align-middle">{{ $cart->quantity }}</td>

                                            <td>{{ $cart->price }}/-</td>

                                            <td><a href="{{ route('cart.delete', $cart->id) }}"
                                                    class="btn btn-icon btn-danger" data-confirm-delete="true"><i
                                                        class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    @endforeach
                                    @php
                                        // $vat = ($total - $discount) * (13 / 100);
                                        // $subtotal = $total - $discount + $vat;
                                        $subtotal = $total - $discount;
                                    @endphp
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if (count($carts) > 0)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cart Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-2 d-flex align-center justify-content-between border-bottom">
                            <div>
                                <h6>Total</h6>
                            </div>
                            <div>
                                <h6>{{ round($total) }}/-</h6>

                            </div>
                        </div>
                        <div class="mb-2 d-flex align-center justify-content-between border-bottom">
                            <div>
                                <h6>Discount</h6>
                            </div>
                            <div>
                                <h6>{{ round($discount, 2) }}/-</h6>

                            </div>
                        </div>
                        {{-- <div class="mb-2 d-flex align-center justify-content-between border-bottom">
                        <div>
                            <h6>VAT</h6>
                        </div>
                        <div>
                            <h6>{{ round($vat,2) }}/-</h6>

                        </div>
                    </div> --}}
                        <div class="mb-2 d-flex align-center justify-content-between border-bottom">
                            <div>
                                <h5>Sub Total</h5>
                            </div>
                            <div>
                                <h5>{{ round($subtotal, 2) }}/-</h5>
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <a href="{{ route('checkout.view') }}" class="btn btn-success">Checkout</a>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
</x-app-layout>
