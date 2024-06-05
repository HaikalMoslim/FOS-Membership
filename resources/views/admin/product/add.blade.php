@extends('layouts.admin')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Style</label>
                        <input type="text" name="style" class="form-control"></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Color</label>
                        <input name="color" rows="3" class="form-control"></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Fit Type</label>
                        <input name="fit_type" rows="3" class="form-control"></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Pattern Type</label>
                        <input name="pattern" rows="3" class="form-control"></input>
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Clothing Type</label>
                        <input name="clothing_type" rows="3" class="form-control"></input>
                    </div>
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