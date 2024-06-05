@extends('layouts.admin')

@section('title')
    Edit Product Outlet
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product Outlet</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product_outlets/'.$product_outlets->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')    
            @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Location</label>
                        <select class="form-select">
                            <option value="">{{$product_outlets->location->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$product_outlets->name}}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$product_outlets->slug}}" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{$product_outlets->original_price}}" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{$product_outlets->selling_price}}" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" value="{{$product_outlets->tax}}" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="{{$product_outlets->quantity}}" name="quantity">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$product_outlets->status =="1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$product_outlets->trending =="1" ? 'checked':''}} name="trending">
                    </div>
                    @if($product_outlets->image)
                        <img src="{{asset('assets/uploads/prodoutlet/'.$product_outlets->image)}}" alt="Product image">
                    @endif
                    <div class="cold-md-12">
                        <input name="image" type="file" class="form-control"></input>
                    </div>
                    <div class="cold-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection