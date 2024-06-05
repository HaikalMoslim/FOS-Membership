@extends('layouts.admin')

@section('title')
    Add Promotion
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Promotion</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-promotion')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Location</label>
                        <select class="form-select" name="outlet_id">
                            <option value="">Select a location</option>
                            @foreach ($location as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="cold-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="end_date">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
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