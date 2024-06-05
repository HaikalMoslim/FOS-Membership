@extends('layouts.admin')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-select">
                            <option value="">{{$products->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$products->slug}}" name="slug">
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control">{{$products->small_description}}</textarea>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{$products->original_price}}"  name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" value="{{$products->tax}}" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{$products->quantity}}" class="form-control" name="quantity">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$products->status =="1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$products->trending =="1" ? 'checked':''}} name="trending">
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Style</label>
                        <input type="text" name="style" rows="3" class="form-control" value="{{$products->style}}" ></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Color</label>
                        <input type="text" name="color" rows="3" class="form-control" value="{{$products->color}}" ></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Fit Type</label>
                        <input type="text" name="fit_type" rows="3" class="form-control" value="{{$products->fit_type}}" ></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Pattern Type</label>
                        <input type="text" name="pattern" rows="3" class="form-control" value="{{$products->pattern}}" ></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Clothing Type</label>
                        <input type="text" name="clothing_type" rows="3" class="form-control" value="{{$products->clothing_type}}" ></input>
                    </div>
                    @if($products->image)
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="Product image">
                    @endif
                    <div class="cold-md-12">
                        <input name="image" type="file" class="form-control"></input>
                    </div>
                    <div class="cold-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection