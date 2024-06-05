@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-0">
            <a class ="route-nav" href="{{url('/')}}">
                Home
            </a> /
            <a class ="route-nav" href="{{url('my-orders/')}}">
                Orders
            </a> /
            <a class ="route-nav" href="{{url('view-order/'.$orders->id)}}">
                {{$orders->id}}
            </a>
        </h6>
    </div>
</div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order View
                            <a href="{{url('my-orders')}}" class="btn btn-warning float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border">{{$orders->fname}}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{$orders->lname}}</div>
                                <label for="">Email</label>
                                <div class="border">{{$orders->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border">
                                    {{$orders->address1}}, <br>
                                    {{$orders->address2}}, <br>
                                    {{$orders->city}}, <br>
                                    {{$orders->state}},
                                    {{$orders->country}}
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border">{{$orders->postalcode}}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" width="50px" alt="Product Image">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                @php
                                    $voucherAmount = $orders->vouchers->sum('amount');
                                @endphp

                                @if($voucherAmount > 0)
                                    <h4 class="px-2">Voucher Amount: <span class="float-end">-{{$voucherAmount}}</span></h4>
                                @endif
                                <hr>
                                <h4 class="px-2">Grand Total: <span class="float-end">{{$orders->total_price}}</span></h4>
                                <h4 class="px-2">Payment Mode: <span class="float-end">{{$orders->payment_mode}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection