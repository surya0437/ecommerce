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
                                    <th class="text-center">#</th>
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
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>
                                                {{ ++$index }}
                                            </td>
                                            <td>
                                                <img alt="image"
                                                    src="{{ asset(Storage::url($order->product->image)) }}"
                                                    width="80">
                                            </td>

                                            <td>{{ $order->product->name }}</td>

                                            <td>{{ $order->product->price }}/-</td>

                                            <td>{{ $order->product->discount_percentage }} %</td>

                                            <td class="align-middle">{{ $order->quantity }}</td>

                                            <td>{{ $order->price }}/-</td>
                                            <td>
                                                <span
                                                    class="badge {{ $order->order->status == 'Pending' ? 'badge-warning' : 'badge-success' }}">{{ $order->order->status }}
                                                </span>
                                            </td>

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
