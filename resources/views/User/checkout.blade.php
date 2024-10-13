<x-app-layout :PageTitle="'Checkout'">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="justify-content-between card-header d-flex align-items-center">
                    <h5>Choose Your Shipping Address</h5>
                    <div>
                        <a href="{{ route('cart.view') }}" class="btn btn-outline-primary">View Cart</a>
                    <button class="btn btn-outline-success" data-toggle="modal" data-target="#shipping_address_model">Add
                        New</button>
                    </div>
                </div>
                <form class="card-body" action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <div class="flex-wrap form-group d-flex align-items-center">
                        @if (count($shipping_addresses) > 0)
                            @foreach ($shipping_addresses as $shipping_address)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_address"
                                        id="exampleRadios{{ $shipping_address->id }}"
                                        value="{{ $shipping_address->id }}">
                                    <label class="form-check-label" for="exampleRadios{{ $shipping_address->id }}">
                                        {{ $shipping_address->title }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <p class="h6 text-danger">No shipping address found !</p>
                        @endif
                    </div>
                    <div>
                        @error('shipping_address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>



{{-- model --}}

<div class="modal fade" id="shipping_address_model" tabindex="-1" role="dialog" aria-labelledby="formModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">New Shipping Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('shipping_address.store') }}" method="POST" class="">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="eg. Home" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="eg. 98xxxxxxxxxx" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control"
                                placeholder="eg. 1234 Elm Street, Apt. 5B, Springfield, IL 62704, USA" name="address">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
