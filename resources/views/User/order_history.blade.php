<x-app-layout :PageTitle="'Order History'">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Your Order History</h4>
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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders) > 0)
                                    @php
                                        $total = 0;
                                        $discount = 0;
                                    @endphp
                                    @foreach ($orders as $index => $cart)
                                        @php
                                            $total += $cart->product->price * $cart->quantity;
                                            $discount +=
                                                ($cart->product->price * $cart->product->discount_percentage) / 100;
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
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
