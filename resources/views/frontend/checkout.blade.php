@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-0">
            <a class ="route-nav" href="{{url('/')}}">
                Home
            </a> /
            <a class ="route-nav" href="{{url('checkout')}}">
                Checkout
            </a>
        </h6>
    </div>
</div>

    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control firstname" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control lastname" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Last Name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Enter Email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Address 2">
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control city" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control state" value="{{Auth::user()->state}}" name="state" placeholder="Enter State">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" value="{{Auth::user()->country}}" name="country" placeholder="Enter Country">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Postal Code</label>
                                    <input type="text" class="form-control postalcode" value="{{Auth::user()->postalcode}}" name="postalcode" placeholder="Enter Postal Code">
                                    <span id="postalcode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        @if($cartitems->count() > 0)
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $total = 0; @endphp
                                    @foreach ($cartitems as $item)
                                    <tr>
                                    @php $total += $item->products->selling_price * $item->prod_quantity; @endphp
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_quantity}}</td>
                                        <td>{{$item->products->selling_price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h6 class="px-2">Grand Total  <span class="float-end">RM {{$total}}</span></h6>
                            <hr>
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" class="btn btn-success w-100 cod_btn">Place Order | COD</button>
                            <!-- <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button> -->
                            <div class="mt-3" id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
                @else
                <div class="card-body">
                <h6>Order Details</h6>
                <hr>
                    <h3>No Product in Cart</h3>
                </div>
            @endif
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AaDQ3_q30gVw82U-lrVeMfquOMwLguaEZYLY0_Z2yCy_85rFjwGvOPkkQK8d_jNTGVwHw6NCIRXzwiJ2&currency=USD"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{$total}}'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                var firstname = $('.firstname').val(); 
                var lastname = $('.lastname').val(); 
                var email = $('.email').val(); 
                var phone = $('.phone').val(); 
                var address1 = $('.address1').val(); 
                var address2 = $('.address2').val(); 
                var city = $('.city').val(); 
                var state = $('.state').val(); 
                var country = $('.country').val();
                var postalcode = $('.postalcode').val();

                $.ajax({
                    method: "POST", 
                    url: "/place-order",
                    data: {
                        'fname': firstname,
                        'lname': lastname,
                        'email': email,
                        'phone': phone,
                        'address1': address1,
                        'address2': address2,
                        'city': city,
                        'state': state,
                        'country': country,
                        'postalcode': postalcode,
                        'payment_mode': "Paid by Paypal",
                        'payment_id': details.id,
                    },
                    success: function (response) {
    swal(response.status).then(function () {
        // Update the URL below with the desired redirect page
        window.location.href = "/my-orders";
    });
}

                });
            });
        }
    }).render('#paypal-button-container');
</script>
@endsection