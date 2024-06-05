@extends('layouts.front')

@section('title')
    Rewards History
@endsection

@section('content')

<div class="py-3 mb-3 shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-0">
            <a class ="route-nav" href="{{url('/')}}">
                Home
            </a> /
            <a class ="route-nav" href="{{url('profile')}}">
                Profile
            </a> /
            <a class ="route-nav" href="{{url('voucher-history')}}">
                Rewards
            </a>
        </h6>
    </div>
</div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Rewards History
                        <a href="{{url('profile/')}}" class="btn btn-warning float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Voucher Code</th>
                                <th>Status</th>
                                <th>Receive Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vouchers as $item)
                                <tr>
                                    <td>{{$item->vcode}}</td>
                                    <td>{{$item->is_used == '0' ? 'Not Used' : 'Already Used'}}</td>
                                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection