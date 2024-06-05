@extends('layouts.admin')

@section('title')
    Edit Promotion
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Promotions</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-promotion/'.$promotions->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Location</label>
                        <select class="form-select" name="outlet_id">
                            <option value="">{{$promotions->location->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$promotions->name}}" name="name">
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$promotions->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" value="{{$promotions->start_date}}" name="start_date">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" value="{{$promotions->end_date}}" name="end_date">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$promotions->status =="1" ? 'checked':''}} name="status">
                    </div>
                    @if($promotions->image)
                        <img src="{{asset('assets/uploads/promotion/'.$promotions->image)}}" alt="Product image">
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